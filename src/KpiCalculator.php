<?php
declare(strict_types=1);

namespace icordeiro\KpiCalculator;

/**
 * Class KpiCalculator
 *
 * Provides static methods to calculate business KPIs such as average ticket,
 * margin, variation, and average price.
 *
 * @package App\Services
 */
abstract class KpiCalculator
{
    /**
     * Calculates the average ticket value.
     *
     * @param int|float $sales Total sales value.
     * @param int|float $coupons Number of coupons or transactions.
     * @return int|float Average ticket value.
     */
    public static function calculateAverageTicket(int|float $sales, int|float $coupons): int|float
    {
        return $sales / $coupons;
    }

    /**
     * Calculates the profit margin over sales.
     *
     * @param int|float $sales Total sales value.
     * @param int|float $costOfGoodsSold Cost of goods sold (CMV).
     * @return int|float Margin percentage.
     */
    public static function calculateMarginOnSales(int|float $sales, int|float $costOfGoodsSold): int|float
    {
        return ($sales - $costOfGoodsSold) / $sales * 100;
    }

    /**
     * Calculates the percentage variation between two values.
     *
     * @param int|float $currentValue Current period value.
     * @param int|float $previousValue Previous period value.
     * @return int|float Percentage variation.
     */
    public static function calculateValueVariation(int|float $currentValue, int|float $previousValue): int|float
    {
        return ($currentValue / $previousValue - 1) * 100;
    }

    /**
     * Calculates the difference between two percentage values.
     *
     * @param int|float $currentPercentage Current percentage value.
     * @param int|float $previousPercentage Previous percentage value.
     * @return int|float Percentage point variation.
     */
    public static function calculatePercentVariation(int|float $currentPercentage, int|float $previousPercentage): int|float
    {
        return $currentPercentage - $previousPercentage;
    }

    /**
     * Calculates the average price per unit sold.
     *
     * @param int|float $sales Total sales value.
     * @param int|float $quantitySold Total quantity sold.
     * @return int|float Average price.
     */
    public static function calculateAveragePrice(int|float $sales, int|float $quantitySold): int|float
    {
        return $sales / $quantitySold;
    }

    /**
     * Calculates the average quantity of products purchased per customer.
     *
     * @param int|float $quantitySold Total quantity sold.
     * @param int|float $customers Number of customers.
     * @return int|float Average quantity per customer.
     */
    public static function calculateAverageQuantityPerCustomer(int|float $quantitySold, int|float $customers): int|float
    {
        return $quantitySold / $customers;
    }
}
