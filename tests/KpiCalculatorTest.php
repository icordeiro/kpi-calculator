<?php

use PHPUnit\Framework\TestCase;
use YourVendor\KpiCalculator\KpiCalculator;

class KpiCalculatorTest extends TestCase
{
    /**
     * Testa o cálculo do ticket médio
     *
     * @return void
     */
    public function testCalculateAverageTicket()
    {
        $result = KpiCalculator::calculateAverageTicket(10000, 250);
        $this->assertEquals(40, $result);
    }

    /**
     * Testa o cálculo da margem sobre venda
     *
     * @return void
     */
    public function testCalculateMarginOnSales()
    {
        $result = KpiCalculator::calculateMarginOnSales(10000, 7000);
        $this->assertEquals(30, $result);
    }

    /**
     * Testa a variação de valor entre valores atual e anterior
     *
     * @return void
     */
    public function testCalculateVariationValue()
    {
        $result = KpiCalculator::calculateVariationValue(12000, 10000);
        $this->assertEquals(20, $result);
    }

    /**
     * Testa a variação percentual entre valores atual e anterior
     *
     * @return void
     */
    public function testCalculateVariationPercentual()
    {
        $result = KpiCalculator::calculateVariationPercentual(30, 25);
        $this->assertEquals(5, $result);
    }

    /**
     * Testa o cálculo do preço médio
     *
     * @return void
     */
    public function testCalculateAveragePrice()
    {
        $result = KpiCalculator::calculateAveragePrice(10000, 250);
        $this->assertEquals(40, $result);
    }

    /**
     * Testa o cálculo da quantidade média por cliente
     *
     * @return void
     */
    public function testCalculateAverageQuantityPerCustomer()
    {
        $result = KpiCalculator::calculateAverageQuantityPerCustomer(1000, 200);
        $this->assertEquals(5, $result);
    }
}
