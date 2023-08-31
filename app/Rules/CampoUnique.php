<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CampoUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $table;
    protected $column;
    protected $softDeleted;
    protected $ignoreId;

    public function __construct($table, $column, $ignoreId = null, $softDeleted = false)
    {
        $this->table = $table;
        $this->column = $column;
        $this->ignoreId = $ignoreId;
        $this->softDeleted = $softDeleted;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $query = DB::table($this->table)
            ->whereRaw('UPPER(' . $this->column . ') = ?', [mb_strtoupper($value, "UTF-8")]);

        if ($this->softDeleted) {
            $query->whereNull('deleted_at');
        } else {
            $query->where('delete', 0);
        }

        if (!is_null($this->ignoreId)) {
            $query->where('id', '<>', $this->ignoreId);
        }

        return $query->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute ya está en uso.';
    }
}
