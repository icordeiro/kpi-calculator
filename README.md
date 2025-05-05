
# KPI Calculator

A lightweight and reusable PHP library for calculating key business performance indicators (KPIs). Useful for dashboards, BI systems, or any reporting automation.

# 📦 Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require icordeiro/kpi-calculator
```

# 🚀 Features

- Calculate **Average Ticket**
- Calculate **Gross Margin Percentage**
- Calculate **Value and Percentage Variations**
- Calculate **Average Price per Unit**
- Calculate **Quantity per Customer**
- **Error handling**: Methods now validate inputs and throw exceptions if required, such as checking for division by zero.

# 🔧 Usage

```php
<?php

require 'vendor/autoload.php';

use icordeiro\KpiCalculator;

try {
    $totalSales = 10000;
    $totalReceipts = 250;
    $cmv = 7000;
    $previousValue = 8500;
    $currentValue = 10000;
    $totalQuantity = 500;
    $customers = 200;

    // Average Ticket
    $averageTicket = KpiCalculator::calculateAverageTicket($totalSales, $totalReceipts);
    // Result: 40.0

    // Gross Margin Percentage
    $margin = KpiCalculator::calculateMarginOnSales($totalSales, $cmv);
    // Result: 30.0

    // Value Variation (%)
    $valueVariation = KpiCalculator::calculateValueVariation($currentValue, $previousValue);
    // Result: 17.65...

    // Percentage Variation
    $percentageVariation = KpiCalculator::calculatePercentageVariation(70.0, 65.0);
    // Result: 5.0

    // Average Price per Unit
    $avgPrice = KpiCalculator::calculateAveragePrice($totalSales, $totalQuantity);
    // Result: 20.0

    // Quantity per Customer
    $qtyPerCustomer = KpiCalculator::calculateQuantityPerCustomer($totalQuantity, $customers);
    // Result: 2.5
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
```

# 🧪 Available Methods (updated to reflect exceptions)

| Method                               | Description                                                                 |
|--------------------------------------|-----------------------------------------------------------------------------|
| `calculateAverageTicket`             | Total sales divided by the number of receipts. Throws `InvalidArgumentException` if receipts are zero. |
| `calculateMarginOnSales`            | `(sales - cost) / sales * 100`. Throws `InvalidArgumentException` for invalid values like division by zero. |
| `calculateValueVariation`           | `(current / previous - 1) * 100`. Throws `InvalidArgumentException` if previous value is zero. |
| `calculatePercentageVariation`      | `currentPercentage - previousPercentage`.                                      |
| `calculateAveragePrice`             | Total sales divided by quantity sold. Throws `InvalidArgumentException` for zero quantity sold. |
| `calculateQuantityPerCustomer`      | Quantity sold divided by the number of customers. Throws `InvalidArgumentException` for zero customers. |

# 🧱 Requirements

- PHP 8.1 or higher

# 📄 License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.

# 🙌 Contributing

Pull requests are welcome. If you have ideas for new KPI methods or improvements, feel free to open an issue or PR.

---

Made with ❤️ by [icordeiro](https://github.com/icordeiro)
