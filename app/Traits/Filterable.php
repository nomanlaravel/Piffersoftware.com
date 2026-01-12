<?php
namespace App\Traits;
trait Filterable
{
    public function scopeApplyFilters($query, array $filters, string $tableName)
    {
        foreach ($filters as $column => $value) {
            if (!empty($value)) {
                // Handle different filter types
                if (is_array($value)) {
                    // For range filters or multiple values
                    $query->whereIn($tableName . '.' . $column, $value);
                } else {
                    // For simple equality or LIKE filters
                    $query->where($tableName . '.' . $column, 'LIKE', "%{$value}%");
                }
            }
        }

        return $query;
    }
}
