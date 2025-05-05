<?php

use PHPUnit\Framework\TestCase;
use icordeiro\KpiCalculator\KpiCalculator;

/**
 * Test class for KpiCalculator
 */
class KpiCalculatorTest extends TestCase
{
    /**
     * Tests the calculation of the average ticket value.
     *
     * @return void
     */
    public function testCalculateAverageTicket()
    {
        // Tests with valid values
        $result = KpiCalculator::calculateAverageTicket(10000, 250);
        $this->assertEquals(40, $result);

        // Tests with coupons equal to zero, should throw an exception
        $this->expectException(\InvalidArgumentException::class);
        KpiCalculator::calculateAverageTicket(10000, 0);

        // Tests with coupons equal to zero and the fallback returning 0
        $result = KpiCalculator::calculateAverageTicket(10000, 0, false);
        $this->assertEquals(0, $result);
    }

    /**
     * Tests the calculation of margin on sales.
     *
     * @return void
     */
    public function testCalculateMarginOnSales()
    {
        // Tests with valid values
        $result = KpiCalculator::calculateMarginOnSales(10000, 7000);
        $this->assertEquals(30, $result);

        // Tests with sales equal to zero, should throw an exception
        $this->expectException(\InvalidArgumentException::class);
        KpiCalculator::calculateMarginOnSales(0, 7000);

        // Tests with sales equal to zero and the fallback returning 0
        $result = KpiCalculator::calculateMarginOnSales(0, 7000, false);
        $this->assertEquals(0, $result);
    }

    /**
     * Tests the value variation between the current and previous values.
     *
     * @return void
     */
    public function testCalculateVariationValue()
    {
        // Tests with valid values
        $result = KpiCalculator::calculateValueVariation(12000, 10000);
        $this->assertEquals(20, $result);

        // Tests with previousValue equal to zero, should throw an exception
        $this->expectException(\InvalidArgumentException::class);
        KpiCalculator::calculateValueVariation(12000, 0);

        // Tests with previousValue equal to zero and the fallback returning 0
        $result = KpiCalculator::calculateValueVariation(12000, 0, false);
        $this->assertEquals(0, $result);
    }

    /**
     * Tests the percentage variation between the current and previous values.
     *
     * @return void
     */
    public function testCalculateVariationPercentual()
    {
        // Tests with valid values
        $result = KpiCalculator::calculatePercentVariation(30, 25);
        $this->assertEquals(5, $result);
    }

    /**
     * Tests the calculation of average price per unit sold.
     *
     * @return void
     */
    public function testCalculateAveragePrice()
    {
        // Tests with valid values
        $result = KpiCalculator::calculateAveragePrice(10000, 250);
        $this->assertEquals(40, $result);

        // Tests with quantitySold equal to zero, should throw an exception
        $this->expectException(\InvalidArgumentException::class);
        KpiCalculator::calculateAveragePrice(10000, 0);

        // Tests with quantitySold equal to zero and the fallback returning 0
        $result = KpiCalculator::calculateAveragePrice(10000, 0, false);
        $this->assertEquals(0, $result);
    }

    /**
     * Tests the calculation of the average quantity per customer.
     *
     * @return void
     */
    public function testCalculateAverageQuantityPerCustomer()
    {
        // Tests with valid values
        $result = KpiCalculator::calculateAverageQuantityPerCustomer(1000, 200);
        $this->assertEquals(5, $result);

        // Tests with customers equal to zero, should throw an exception
        $this->expectException(\InvalidArgumentException::class);
        KpiCalculator::calculateAverageQuantityPerCustomer(1000, 0);

        // Tests with customers equal to zero and the fallback returning 0
        $result = KpiCalculator::calculateAverageQuantityPerCustomer(1000, 0, false);
        $this->assertEquals(0, $result);
    }
}
