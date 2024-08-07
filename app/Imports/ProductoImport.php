<?php

namespace App\Imports;

use App\Models\Almacenarea;
use App\Models\Caracteristica;
use App\Models\Category;
use App\Models\Estante;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Nwidart\Modules\Facades\Module;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class ProductoImport implements ToModel, WithEvents, WithHeadingRow, WithValidation, WithUpserts, WithBatchInserts, WithChunkReading
{

    use Importable;

    const HEADERS_IMPORT_PRODUCT = [
        'item', 'nombre', 'categoria', 'subcategoria', 'marca',
        'codigo_unidad_medida', 'unidad_medida',
        'area_almacen', 'estante_almacen', 'modelo',
        'sku', 'numero_parte', 'precio_compra', 'precio_venta',
        'stock_minimo', 'publicado_web'
    ];

    private $empresa;
    private $headers_especificaciones = [];

    public function __construct()
    {
        $this->empresa = mi_empresa();
    }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        DB::beginTransaction();
        try {

            // if (empty(toUTF8Import($row['nombre']))) {
            //     return null;
            // }

            $category = Category::firstOrCreate([
                'name' => toUTF8Import($row['categoria']),
            ], [
                'orden' => 1 + Category::max('orden') ?? 0
            ]);
            $subcategory = Subcategory::firstOrCreate([
                'name' => toUTF8Import($row['subcategoria']),
            ], [
                'orden' => 1 + Subcategory::max('orden') ?? 0
            ]);
            $marca = Marca::firstOrCreate([
                'name' => toUTF8Import($row['marca']),
            ]);
            $unit = Unit::firstOrCreate([
                'code' => toUTF8Import($row['codigo_unidad_medida']),
            ], [
                'name' => toUTF8Import($row['unidad_medida']),
            ]);

            if (!$category->subcategories()->where('subcategory_id', $subcategory->id)->exists()) {
                $category->subcategories()->attach([$subcategory->id]);
            }

            $almacenarea = null;
            $estante = null;
            if (Module::isEnabled('Almacen')) {
                if (!empty(toUTF8Import($row['area_almacen']))) {
                    $almacenarea = Almacenarea::firstOrCreate([
                        'name' => toUTF8Import($row['area_almacen']),
                    ]);
                }
                if (!empty(toUTF8Import($row['estante_almacen']))) {
                    $estante = Estante::firstOrCreate([
                        'name' => toUTF8Import($row['estante_almacen']),
                    ]);
                }
            }

            $producto = Producto::updateOrCreate(
                [
                    'name' => toUTF8Import($row['nombre']),
                ],
                [

                    'modelo' => toUTF8Import($row['modelo']),
                    'sku' => toUTF8Import($row['sku']),
                    'code' => Str::random(9),
                    'partnumber' => toUTF8Import($row['numero_parte']),
                    'pricebuy' => $row['precio_compra'],
                    'pricesale' => $row['precio_venta'],
                    'minstock' => $row['stock_minimo'],
                    'publicado' => $row['publicado_web'],
                    'marca_id' => $marca->id,
                    'unit_id' => $unit->id,
                    'category_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'almacenarea_id' => Module::isEnabled('Almacen') && !empty($almacenarea) ? $almacenarea->id : null,
                    'estante_id' => Module::isEnabled('Almacen') && !empty($estante) ? $estante->id : null,
                    'user_id'   => auth()->user()->id
                ]
            );

            if (Module::isEnabled('Marketplace')) {
                if (count($this->headers_especificaciones) > 0) {
                    foreach ($this->headers_especificaciones as $c) {
                        if (!empty(toUTF8Import($row[$c]))) {

                            $caracteristica = Caracteristica::firstOrCreate([
                                'name' => str_replace("_", " ", toUTF8Import($c)),
                            ], [
                                'orden' => 1 + Caracteristica::max('orden') ?? 0
                            ]);

                            $especificacion = $caracteristica->especificacions()
                                ->firstOrCreate(['name' => toUTF8Import($row[$c])]);

                            $withPivotData = [$especificacion->id => [
                                'orden' => 1 + $producto->especificacions()->max('orden') ?? 0,
                            ]];


                            if (!$producto->especificacions()->where('especificacion_id', $especificacion->id)->exists()) {
                                //     $producto->especificacions()->updateExistingPivot($especificacion->id, [
                                //         'orden' => 1 + $producto->especificacions()->max('orden') ?? 0,
                                //     ]);
                                // } else {
                                $producto->especificacions()->syncWithoutDetaching($withPivotData);
                            }
                            // $producto->especificacions()->syncWithoutDetaching($withPivotData);
                        }
                    }
                }
            }

            $producto->assignPriceProduct();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    // public function collection(Collection $rows)
    // {

    //     Validator::make($rows->toArray(), [
    //         [
    //             '*.nombre' => ['required', 'string', 'min:3'],
    //             '*.modelo' => ['nullable', 'string', 'min:1'],
    //             '*.sku' => ['nullable', 'string', 'min:4'],
    //             '*.numero_parte' => ['nullable', 'string', 'min:4'],
    //             '*.precio_compra' => [
    //                 'required', 'numeric', 'decimal:0,4',
    //                 $this->empresa->usarLista() ? 'gt:0' : ''
    //             ],
    //             '*.precio_venta' => [
    //                 'nullable', Rule::requiredIf(!$this->empresa->usarLista()),
    //                 'numeric', 'decimal:0,4', $this->empresa->usarLista() ? '' : 'gt:0'
    //             ],
    //             '*.stock_minimo' => ['required', 'integer', 'min:0'],
    //             '*.publicado_web' => ['nullable', 'integer', 'min:0', 'max:1'],
    //             '*.marca' => ['required', 'string', 'min:2'],
    //             '*.unidad_medida' => ['required', 'string', 'min:1'],
    //             '*.codigo_unidad_medida' => ['required', 'string', 'min:1'],
    //             '*.categoria' => ['required', 'string', 'min:2'],
    //             '*.subcategoria' => ['required', 'string', 'min:2',],
    //             '*.area_almacen' => ['nullable', 'string', 'min:1'],
    //             '*.estante_almacen' => ['nullable', 'string', 'min:1',],
    //         ]
    //     ])->validate();

    //     foreach ($rows as $row) {
    //         try {
    //             DB::beginTransaction();

    //             if (empty(toUTF8Import($row['nombre']))) {
    //                 return null;
    //             }

    //             $category = Category::firstOrCreate([
    //                 'name' => toUTF8Import($row['categoria']),
    //             ]);
    //             $subcategory = Subcategory::firstOrCreate([
    //                 'name' => toUTF8Import($row['subcategoria']),
    //             ]);
    //             $marca = Marca::firstOrCreate([
    //                 'name' => toUTF8Import($row['marca']),
    //             ]);
    //             $unit = Unit::firstOrCreate([
    //                 'code' => toUTF8Import($row['codigo_unidad_medida']),
    //             ], [
    //                 'name' => toUTF8Import($row['unidad_medida']),
    //             ]);


    //             if (!$category->subcategories()->where('subcategory_id', $subcategory->id)->exists()) {
    //                 $category->attach([$subcategory->id]);
    //             }

    //             $almacenarea = null;
    //             $estante = null;
    //             if (Module::isEnabled('Almacen')) {
    //                 if (!empty(toUTF8Import($row['area_almacen']))) {
    //                     $almacenarea = Almacenarea::firstOrCreate([
    //                         'name' => toUTF8Import($row['area_almacen']),
    //                     ]);
    //                 }
    //                 if (!empty(toUTF8Import($row['estante_almacen']))) {
    //                     $estante = Estante::firstOrCreate([
    //                         'name' => toUTF8Import($row['estante_almacen']),
    //                     ]);
    //                 }
    //             }

    //             $producto = Producto::updateOrCreate(
    //                 [
    //                     'name' => toUTF8Import($row['nombre']),
    //                 ],
    //                 [
    //                     'modelo' => toUTF8Import($row['modelo']),
    //                     'sku' => toUTF8Import($row['sku']),
    //                     'code' => Str::random(9),
    //                     'partnumber' => toUTF8Import($row['numero_parte']),
    //                     'pricebuy' => $row['precio_compra'],
    //                     'pricesale' => $row['precio_venta'],
    //                     'minstock' => toUTF8Import($row['stock_minimo']),
    //                     'publicado' => toUTF8Import($row['publicado_web']),
    //                     'marca_id' => $marca->id,
    //                     'unit_id' => $unit->id,
    //                     'category_id' => $category->id,
    //                     'subcategory_id' => $subcategory->id,
    //                     'almacenarea_id' => Module::isEnabled('Almacen') && !empty($almacenarea) ? $almacenarea->id : null,
    //                     'estante_id' => Module::isEnabled('Almacen') && !empty($estante) ? $estante->id : null,
    //                 ]
    //             );
    //             DB::commit();
    //         } catch (\Exception $e) {
    //             DB::rollBack();
    //             throw $e;
    //         } catch (\Throwable $e) {
    //             DB::rollBack();
    //             throw $e;
    //         }
    //     }
    // }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'min:3'],
            'modelo' => ['nullable', 'string', 'min:1'],
            'sku' => ['nullable', 'string', 'min:4'],
            'numero_parte' => ['nullable', 'string', 'min:4'],
            'precio_compra' => [
                'required', 'numeric', 'decimal:0,4',
                $this->empresa->usarLista() ? 'gt:*.0' : ''
            ],
            'precio_venta' => [
                'nullable', Rule::requiredIf(!$this->empresa->usarLista()),
                'numeric', 'decimal:0,4', $this->empresa->usarLista() ? '' : 'gt:*.0'
            ],
            'stock_minimo' => ['required', 'integer', 'min:0'],
            'publicado_web' => ['nullable', 'integer', 'min:0', 'max:1'],
            'marca' => ['required', 'string', 'min:2'],
            'unidad_medida' => ['required', 'string', 'min:1'],
            'codigo_unidad_medida' => ['required', 'string', 'min:1'],
            'categoria' => ['required', 'string', 'min:2'],
            'subcategoria' => ['required', 'string', 'min:2',],
            'area_almacen' => ['nullable', 'string', 'min:1'],
            'estante_almacen' => ['nullable', 'string', 'min:1',],
        ];
    }

    public function registerEvents(): array
    {
        return [

            BeforeSheet::class => function (BeforeSheet $event) {
                $this->beforeSheet($event);
            },

            // BeforeSheet::class => [self::class, 'beforeSheet'],
        ];
    }

    public function beforeSheet(BeforeSheet $event)
    {
        $sheet = $event->getSheet(0);
        $headers = self::extractHeaders($sheet, 'A', '2');
        self::validateHeaders($headers);
        $this->headers_especificaciones = self::extractHeadersEspecificaciones($headers);
    }

    private static function extractHeaders($sheet, $column, $cell,)
    {
        $headersArray = [];
        while ($sheet->getCell($column . $cell)->getValue() != '') {
            $headersArray[] = $sheet->getCell($column . $cell)->getValue();
            $column++;
        }

        return $headersArray;
    }

    private static function extractHeadersEspecificaciones(array $headers)
    {
        $headers_especificaciones = [];
        foreach ($headers as $header) {
            if (!in_array($header, self::HEADERS_IMPORT_PRODUCT)) {
                $headers_especificaciones[] = $header;
            }
        }

        return $headers_especificaciones;
    }

    private static function validateHeaders(array $headers)
    {

        if (count($headers) == 0) {
            throw new \Exception("El archivo importado no contiene los encabezados requeridos " .  implode(', ', self::HEADERS_IMPORT_PRODUCT));
        }

        foreach (self::HEADERS_IMPORT_PRODUCT as $header) {
            if (!in_array($header, $headers)) {
                throw new \Exception("El archivo importado no contiene el encabezado requerido: $header");
            }
        }
    }

    // public function extractHeaders(array $array)
    // {
    //     $headersArray = [];
    //     $especificacionesHeader = [];
    //     $headers = array_keys($array) ?? [];
    //     foreach ($headers as $header) {
    //         if (in_array($header, $this->requiredHeaders)) {
    //             $headersArray[] = $header;
    //         } else {
    //             $especificacionesHeader[] = $header;
    //         }
    //     }

    //     // dd($headersArray, $especificacionesHeader);
    //     return [
    //         'headers_producto' => $headersArray,
    //         'headers_especificaciones' => $especificacionesHeader
    //     ];
    // }

    public function uniqueBy()
    {
        return ['name'];
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
