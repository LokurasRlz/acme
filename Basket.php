<?php

class Basket
{
    private $productCatalogue;
    private $deliveryChargeRules;
    private $offers;
    private $items;

    public function __construct($productCatalogue, $deliveryChargeRules, $offers)
    {
        $this->productCatalogue = $productCatalogue;
        $this->deliveryChargeRules = $deliveryChargeRules;
        $this->offers = $offers;
        $this->items = [];
    }

    public function add($productCode)
    {
        if (isset($this->productCatalogue[$productCode])) {
            $this->items[] = $productCode;
        }
    }

    public function total()
    {
        $subtotal = $this->calculateSubtotal();
        $totalDiscount = $this->calculateTotalDiscount();
        $deliveryCost = $this->calculateDeliveryCost($subtotal - $totalDiscount);

        return $subtotal + $deliveryCost - $totalDiscount;
    }

    private function calculateSubtotal()
    {
        $subtotal = 0;
        foreach ($this->items as $item) {
            if (isset($this->productCatalogue[$item])) {
                $subtotal += $this->productCatalogue[$item]['price'];
            }
        }
        return $subtotal;
    }

    private function calculateDeliveryCost($subtotal)
    {
        foreach ($this->deliveryChargeRules as $rule) {
            if ($subtotal > $rule['limit']) {
                return $rule['charge'];
            }
        }
        return 0;
    }

    private function calculateTotalDiscount()
    {
        $discount = 0;
        $productCounts = array_count_values($this->items);

        foreach ($this->offers as $productCode => $discountPercentage) {
            if (isset($productCounts[$productCode])) {
                $productCount = $productCounts[$productCode];
                $discount += floor($productCount / 2) * ($this->productCatalogue[$productCode]['price'] * $discountPercentage / 100);
            }
        }

        return $discount;
    }
}

?>