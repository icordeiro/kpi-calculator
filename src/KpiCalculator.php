<?php
declare(strict_types=1);

namespace icordeiro\KpiCalculator;

/**
 * Class KpiCalculator
 *
 * Provides static methods to calculate business KPIs such as average ticket,
 * margin, variation, and average price.
 */
abstract class KpiCalculator
{
    /**
     * Calculates the average ticket value.
     * 
     * This method divides total sales by the number of coupons (or transactions).
     * 
     * @param int|float $sales Total sales value.
     * @param int|float $coupons Number of coupons or transactions.
     * @param bool $throwOnZero Flag to throw exception when coupons are zero.
     * @return int|float Average ticket value.
     * @throws \InvalidArgumentException If coupons are zero and $throwOnZero is true.
     */
    public static function calculateAverageTicket(int|float $sales, int|float $coupons, bool $throwOnZero = true): int|float 
    {
        if ($coupons == 0) {
            return $throwOnZero
                ? throw new \InvalidArgumentException("Coupons must not be zero.")
                : 0;
        }

        return $sales / $coupons;
    }

    /**
     * Calculates the profit margin over sales.
     * 
     * This method calculates the margin percentage by subtracting the cost of goods sold
     * from the total sales, and then dividing by the total sales value.
     * 
     * @param int|float $sales Total sales value.
     * @param int|float $costOfGoodsSold Cost of goods sold (CMV).
     * @param bool $throwOnZero Flag to throw exception when sales are zero.
     * @return int|float Margin percentage.
     * @throws \InvalidArgumentException If sales are zero and $throwOnZero is true.
     */
    public static function calculateMarginOnSales(int|float $sales, int|float $costOfGoodsSold, bool $throwOnZero = true): int|float 
    {
        if ($sales == 0) {
            return $throwOnZero
                ? throw new \InvalidArgumentException("Sales must not be zero.")
                : 0;
        }

        return (($sales - $costOfGoodsSold) / $sales) * 100;
    }

    /**
     * Calculates the percentage variation between two values.
     * 
     * This method calculates the percentage difference between the current value and the previous value.
     * 
     * @param int|float $currentValue Current period value.
     * @param int|float $previousValue Previous period value.
     * @param bool $throwOnZero Flag to throw exception when previous value is zero.
     * @return int|float Percentage variation.
     * @throws \InvalidArgumentException If previous value is zero and $throwOnZero is true.
     */
    public static function calculateValueVariation(int|float $currentValue, int|float $previousValue, bool $throwOnZero = true): int|float 
    {
        if ($previousValue == 0) {
            return $throwOnZero
                ? throw new \InvalidArgumentException("Previous value must not be zero.")
                : 0;
        }

        return (($currentValue / $previousValue) - 1) * 100;
    }

    /**
     * Calculates the difference between two percentage values.
     * 
     * This method simply calculates the difference (or variation) between two percentage values.
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
     * This method divides total sales by the total quantity of units sold.
     * 
     * @param int|float $sales Total sales value.
     * @param int|float $quantitySold Total quantity sold.
     * @param bool $throwOnZero Flag to throw exception when quantity sold is zero.
     * @return int|float Average price per unit.
     * @throws \InvalidArgumentException If quantity sold is zero and $throwOnZero is true.
     */
    public static function calculateAveragePrice(int|float $sales, int|float $quantitySold, bool $throwOnZero = true): int|float 
    {
        if ($quantitySold == 0) {
            return $throwOnZero
                ? throw new \InvalidArgumentException("Quantity sold must not be zero.")
                : 0;
        }

        return $sales / $quantitySold;
    }

    /**
     * Calculates the average quantity of products purchased per customer.
     * 
     * This method divides total quantity sold by the total number of customers.
     * 
     * @param int|float $quantitySold Total quantity sold.
     * @param int|float $customers Number of customers.
     * @param bool $throwOnZero Flag to throw exception when customers count is zero.
     * @return int|float Average quantity per customer.
     * @throws \InvalidArgumentException If customers count is zero and $throwOnZero is true.
     */
    public static function calculateAverageQuantityPerCustomer(int|float $quantitySold, int|float $customers, bool $throwOnZero = true): int|float 
    {
        if ($customers == 0) {
            return $throwOnZero
                ? throw new \InvalidArgumentException("Customer count must not be zero.")
                : 0;
        }

        return $quantitySold / $customers;
    }
}
