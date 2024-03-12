<?php

use App\Enums\DefaultConceptsEnum;
use App\Models\Empresa;
use App\Models\Guia;
use App\Models\Pricetype;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function verificarCarpeta($path, $disk = 'public')
{

    if ($disk == 'local') {
        if (!Storage::directoryExists(storage_path('app/' . $path))) {
            Storage::disk($disk)->makeDirectory($path);
        }
    } else {
        if (!Storage::directoryExists($path)) {
            Storage::makeDirectory($path);
        }
    }

    return true;
}


function formatDecimalOrInteger($numero, $decimals = 2)
{
    return intval($numero) == floatval($numero) ? intval($numero) : number_format($numero, $decimals, '.', '');
}

function formatDate($date, $format = "DD MMMM YYYY hh:mm A")
{
    return !is_null($date) ? Str::upper(Carbon::parse($date)->locale('es')->isoformat($format)) : null;
}

function formatTelefono($numero, $group = 3, $prefijo = '')
{
    return $prefijo . chunk_split($numero, $group);
}


function extraerMensaje($data)
{
    $mensaje = '';
    if (count($data)) {
        foreach ($data as $key => $value) {
            if ($value > 0) {
                $table = str_replace('_', ' ', $key);
                $mensaje .= $mensaje == '' ? $table : ", $table";
            }
        }
    }
    return $mensaje == '' ? '' : "($mensaje)";
}


function getValueNode($ruta, $node = 'DigestValue', $position = 0)
{
    $doc = new DOMDocument();

    $doc->formatOutput = FALSE;
    $doc->preserveWhiteSpace = TRUE;
    $doc->load($ruta);
    //===================rescatamos Codigo(HASH_CPE)==================
    $node_value = $doc->getElementsByTagName($node)->item($position)->nodeValue;
    return $node_value ?? null;
}

function getNotesNode($ruta, $node = 'Note')
{
    $notes = '';
    $doc = new DOMDocument();

    $doc->formatOutput = FALSE;
    $doc->preserveWhiteSpace = TRUE;
    $doc->load($ruta);

    $notes_value = $doc->getElementsByTagName($node);
    foreach ($notes_value as $note) {
        // $notes[] = $note->nodeValue;
        $notes .= '<p class="text-left mb-1 text-sm">' . $note->nodeValue . '</p>';
    }

    return $notes;
}

function toastJSON($title, $icon = 'success')
{
    return response()->json([
        'title' => $title,
        'icon' => $icon,
    ])->getData();
}

function getTiypemovimientos()
{
    return \App\Enums\MovimientosEnum::cases() ?? [];
}


function verifyMonthbox($monthbox)
{
    return $monthbox->isUsing();
}


function verifyOpencaja($openbox)
{
    return $openbox->isActivo();
}

function mi_empresa()
{
    return Empresa::first();
}


function getTextConcept($value)
{
    switch ($value) {
        case  DefaultConceptsEnum::VENTAS->value;
            $text = 'VENTA FÍSICA';
            break;
        case DefaultConceptsEnum::INTERNET->value;
            $text = 'PAGO INTERNET';
            break;
        case DefaultConceptsEnum::PAYCUOTA->value;
            $text = 'PAGO CUOTA';
            break;
        case DefaultConceptsEnum::COMPRA->value;
            $text = 'COMPRA';
            break;
        case DefaultConceptsEnum::PAYCUOTACOMPRA->value;
            $text = 'PAGO CUOTA COMPRA';
            break;
        case DefaultConceptsEnum::PAYEMPLOYER->value;
            $text = 'PAGO MENSUALIDAD PERSONAL';
            break;
            // case DefaultConceptsEnum::APERTURA->value;
            //     $text = 'APERTURA CAJA DIARIA';
            //     break;
        default:
            $text = null;
            break;
    }

    return $text;
}

function getMessageOpencaja()
{
    return response()->json([
        'title' => 'APERTURAR NUEVA CAJA !',
        'text' => "La apertura de caja no se encuentra disponible en este momento, o ha sido cerrada."
    ])->getData();
}

function getIndicadorTransbProg()
{
    return response()->json([
        'code' => Guia::IND_TRA_PROG,
        'name' => Guia::NAME_IND_TRA_PROG
    ])->getData();
}
function getIndicadorVehiculoML()
{
    return response()->json([
        'code' => Guia::IND_TRASL_VEHIC_CAT_ML,
        'name' => Guia::NAME_IND_TRASL_VEHIC_CAT_ML
    ])->getData();
}

function getIndicadorRetornoVehEnvaVacio()
{
    return response()->json([
        'code' => Guia::IND_RET_VEH_ENV_EMB_VAC,
        'name' => Guia::NAME_IND_RET_VEH_ENV_EMB_VAC
    ])->getData();
}

function getIndicadorRetornoVehVacio()
{
    return response()->json([
        'code' => Guia::IND_RET_VEH_VAC,
        'name' => Guia::NAME_IND_RET_VEH_VAC
    ])->getData();
}

function getIndicadorTotalDAMDS()
{
    return response()->json([
        'code' => Guia::IND_TOT_MERC_DAM_DS,
        'name' => Guia::NAME_IND_TOT_MERC_DAM_DS
    ])->getData();
}

function getIndicadorRegistrarVehCondTransport()
{
    return response()->json([
        'code' => Guia::IND_REG_VEHIC_COND_TRANSP,
        'name' => Guia::NAME_IND_REG_VEHIC_COND_TRANSP
    ])->getData();
}



function getCarrito()
{
    $carrito = Session::get('carrito', []);
    if (!is_array($carrito)) {
        $carrito = json_decode($carrito, true);
    }

    return $carrito;
}

function getCombo()
{
    $combo = Session::get('combo', []);
    return collect($combo);
}


function getTotalCarrito($sesionName)
{

    $total = 0;
    $gratuito = 0;
    $countgratuitos = 0;
    $countnogratuitos = 0;

    $carrito = Session::get($sesionName, []);
    if (!is_array($carrito)) {
        $carrito = json_decode($carrito, true);
    }

    if (count($carrito) > 0) {
        $carritoJSON = json_decode(Session::get($sesionName));
        foreach ($carritoJSON as $item) {
            if ($item->gratuito) {
                $gratuito += $item->importe;
                $countgratuitos++;
            } else {
                $total += $item->importe;
                $countnogratuitos++;
            }
        }
    }

    return json_encode([
        'total' => formatDecimalOrInteger($total, 3),
        'gratuito' => formatDecimalOrInteger($gratuito, 3),
        'sumatoria' => formatDecimalOrInteger($total + $gratuito, 3),
        'countgratuitos' => $countgratuitos,
        'countnogratuitos' => $countnogratuitos,
        'count' => $countgratuitos + $countnogratuitos,
    ]);

    // $total = Carshoop::Micarrito()
    //     ->where('sucursal_id', $this->sucursal->id)
    //     ->where('gratuito', 0)->sum('total') ?? 0;
    // $this->gratuito = Carshoop::Micarrito()
    //     ->where('sucursal_id', $this->sucursal->id)
    //     ->where('gratuito', 1)->sum('total') ?? 0;
}




function getPrecio($producto, $priceSelected = null, $preciotipocambio = null)
{

    try {
        $datosRango = [];
        $name = null;
        $decimal = 2;
        $roundedTo = 0;
        $rangoexists = false;
        $precioManual = null;
        $oldPrecioSalida = null;
        $precioCompra = number_format($producto->pricebuy, $decimal, '.', '');
        $descuento = number_format(0, 2);
        $amountDescuento = number_format(0, 2);
        $tipocambio = $preciotipocambio == null ? 0 : (float) $preciotipocambio;
        $isRemate = false;
        // $precioVenta = number_format($producto->pricebuy, $decimal, '.', '');
        // $precioDescuento = number_format($precioVenta, $decimal, '.', '');

        $amountDescuentoDolar = number_format(0, $decimal, '.', '');
        $precioVentaDolar = number_format(0, $decimal, '.', '');
        $precioDescuentoDolar = number_format($precioVentaDolar, $decimal, '.', '');

        // if (count($producto->ofertasdisponibles)) {
        //     $descuento = $producto->ofertasdisponibles()->first()->descuento;
        // }
        // $descuentos = $producto->promocions()->descuentos()->disponibles();
        $promociones = $producto->promocions()->activos();
        if ($promociones->descuentos()->exists()) {
            $descuento = $promociones->descuentos()->first()->descuento ?? 0;
        }

        $remates = $producto->promocions()->activos();
        if ($remates->remates()->exists()) {
            $isRemate = true;
        }

        if ($priceSelected) {

            $pricetype = Pricetype::with(['rangos' => function ($query) use ($producto) {
                $query->where('desde', '<=', $producto->pricebuy)
                    ->where('hasta', '>=', $producto->pricebuy);
            }])->find($priceSelected);


            $name = $pricetype->name;
            $decimal = $pricetype->decimals;
            $roundedTo = $pricetype->rounded;

            $precioVenta = number_format(0, $pricetype->decimals, '.', '');
            $amountDescuento = number_format(0, $pricetype->decimals, '.', '');
            $precioDescuento = number_format(0, $pricetype->decimals, '.', '');
            $amountDescuentoDolar = number_format(0, $pricetype->decimals, '.', '');
            $precioVentaDolar = number_format(0, $pricetype->decimals, '.', '');
            $precioDescuentoDolar = number_format(0, $pricetype->decimals, '.', '');
            $oldPrecioSalida = number_format(0, $pricetype->decimals, '.', '');

            $priceManual = $producto->pricetypes()
                ->where('pricetype_id', $priceSelected)->first();

            if ($priceManual) {
                $precioManual = number_format($priceManual->pivot->price, $pricetype->decimals, '.', '');

                $amountDescuento = number_format(($priceManual->pivot->price * $descuento) / 100, $pricetype->decimals, '.', '');
                $precioVenta = number_format($priceManual->pivot->price, $pricetype->decimals, '.', '');
                $precioDescuento = number_format($priceManual->pivot->price - $amountDescuento, $pricetype->decimals, '.', '');

                if ($tipocambio > 0) {
                    $amountDescuentoDolar = number_format((($precioVenta / $tipocambio) * $descuento) / 100, $pricetype->decimals, '.', '');
                    $precioVentaDolar = number_format($precioVenta / $tipocambio, $pricetype->decimals, '.', '');
                    $precioDescuentoDolar = number_format($precioVentaDolar - $amountDescuentoDolar, $pricetype->decimals, '.', '');
                    $oldPrecioSalida = number_format($priceManual->pivot->price, $pricetype->decimals, '.', '');
                }
            }

            if (count($pricetype->rangos) > 0) {
                // $rangoPrice = $pricetype->rangos;
                // if (count($pricetype->rangos)) {
                foreach ($pricetype->rangos as $rango) {
                    if ($producto->pricebuy >= $rango->desde && $producto->pricebuy <= $rango->hasta) {

                        $ganancia = number_format($rango->pivot->ganancia ?? 0, 2, '.', '');
                        $precioCompra = number_format($precioCompra + (($precioCompra * $rango->incremento) / 100), $pricetype->decimals, '.', '');
                        $oldPrecioSalida = number_format($precioCompra + ($precioCompra * $ganancia) / 100, $pricetype->decimals, '.', '');
                        // $priceSelect = $priceManual->pivot->price ?? $oldPrecioSalida;
                        $precioVenta = number_format($priceManual->pivot->price ?? $oldPrecioSalida, $pricetype->decimals, '.', '');


                        // SI DESCUENTO > 0 Y GANANCIA > 0 ENTONCES APLICAMOS DSCT 
                        // AL % GANANCIA Y LUEGO EL RESULTADO RESTAMOS CON EL % GANANCIA
                        if ($descuento > 0 && $ganancia > 0) {
                            $descuentoGanacia = number_format(($ganancia * $descuento) / 100, 2, '.', '');
                            $ganancia = number_format($ganancia - $descuentoGanacia, 2, '.', '');
                            $priceAntesDSCTO = $priceManual->pivot->price ?? $precioCompra;

                            $precioDescuento = number_format(($priceAntesDSCTO + ($priceAntesDSCTO * $ganancia) / 100), $pricetype->decimals, '.', '');
                            $amountDescuento = number_format($precioVenta - $precioDescuento, $pricetype->decimals, '.', '');
                        }

                        $rangoexists = true;
                        $datosRango = $rango;

                        if ($isRemate) {
                            $precioVenta = $precioCompra;
                        }

                        if ($pricetype->rounded > 0) {
                            $precioVenta = round_decimal($precioVenta, $roundedTo);
                            $oldPrecioSalida = round_decimal($oldPrecioSalida, $roundedTo);
                            $precioDescuento = number_format(round_decimal($precioDescuento, $roundedTo), $pricetype->decimals, '.', '');
                        }

                        if ($tipocambio > 0) {
                            // $precioVenta = number_format($precioVenta, $pricetype->decimals, '.', '');
                            // $precioDescuento = number_format($precioVenta - $amountDescuento, $pricetype->decimals, '.', '');
                            $amountDescuentoDolar = number_format($amountDescuento > 0 ? $amountDescuento / $tipocambio : 0, $pricetype->decimals, '.', '');
                            $precioVentaDolar = number_format($precioVenta > 0 ? $precioVenta / $tipocambio : 0, $pricetype->decimals, '.', '');
                            $precioDescuentoDolar = number_format($precioDescuento > 0 ? $precioDescuento / $tipocambio : 0, $pricetype->decimals, '.', '');
                            // $oldPrecioSalida = number_format($oldPrecioSalida, $pricetype->decimals, '.', '');
                        }
                    }
                }
            }
            // else {

            // $amountDescuento = number_format(($precioVenta * $descuento) / 100, $pricetype->decimals, '.', '');
            // $precioVenta = number_format($precioVenta, $pricetype->decimals, '.', '');
            // $precioDescuento = number_format($precioVenta - $amountDescuento, $pricetype->decimals, '.', '');

            // if ($tipocambio > 0) {
            //     $amountDescuentoDolar = number_format((($precioVenta / $tipocambio) * $descuento) / 100, $pricetype->decimals, '.', '');
            //     $precioVentaDolar = number_format($precioVenta / $tipocambio, $pricetype->decimals, '.', '');
            //     $precioDescuentoDolar = number_format($precioVentaDolar - $amountDescuentoDolar, $pricetype->decimals, '.', '');
            //     $oldPrecioSalida = number_format(0, $pricetype->decimals, '.', '');
            // }
            // }
        } else {

            $precioVenta = number_format($producto->pricesale, $decimal, '.', '');
            $precioDescuento = number_format($producto->pricesale, $decimal, '.', '');
            // $diferenciaGan = number_format($precioVenta - $precioCompra, '.', '');


            if ($producto->pricesale > 0) {
                $precioVenta = number_format($producto->pricesale, $decimal, '.', '');
                $diferenciaGan = number_format(($precioVenta - $precioCompra), $decimal, '.', '');

                // $amountDescuento = number_format(($producto->pricesale * $descuento) / 100, $decimal, '.', '');
                $amountDescuento = number_format(($diferenciaGan * $descuento) / 100, $decimal, '.', '');
                $precioDescuento = number_format($producto->pricesale - $amountDescuento, $decimal, '.', '');

                if ($tipocambio > 0) {
                    // $amountDescuentoDolar = number_format((($producto->pricesale / $tipocambio) * $descuento) / 100, $decimal, '.', '');
                    $amountDescuentoDolar = number_format((($diferenciaGan / $tipocambio) * $descuento) / 100, $decimal, '.', '');
                    $precioVentaDolar = number_format(($precioVenta / $tipocambio), $decimal, '.', '');
                    $precioDescuentoDolar = number_format($precioVentaDolar - $amountDescuentoDolar, $decimal, '.', '');
                }
            }
        }

        $json = [
            'success' => true,
            'pricebuy' => $precioCompra,
            'pricesale' => $precioVenta,
            'oldPrice' => $oldPrecioSalida,
            'pricewithdescount' => $precioDescuento,
            'pricemanual' => $precioManual,
            'amountDescuento' => $amountDescuento,
            'decimal' => $decimal,
            'descuento' => $descuento,
            'priceDolar' => $tipocambio > 0 ? $precioVentaDolar : '0.00',
            'amountDescuentoDolar' => $tipocambio == 1 ? '0.00' : $amountDescuentoDolar,
            'pricewithdescountDolar' => $tipocambio == 1 ? '0.00' : $precioDescuentoDolar,
            'existsrango' => $rangoexists,
            'roundedInteger' => $roundedTo,
            'rango' => $datosRango,
            'tipocambio' => $tipocambio > 0 ?  $tipocambio : '0.00',
            'name' => $name,
            'isRemate' => $isRemate,
        ];

        return response()->json($json, 200);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        throw $e;
    } catch (\Throwable $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        throw $e;
    }
}

function round_decimal($value, $roundedTo = 1)
{
    $result = $value - floor($value);
    $rounded = $roundedTo == 1 ? 0.5 : 1;

    if ($result > 0) {
        return ($result <= 0.5) ? (float) (floor($value) + $rounded) : round($value);
    } else {
        return (float) $value;
    }
}