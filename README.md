# acem

Acme Widget Co Sales System

This repository contains an implementation of the basket system for Acme Widget Co's sales.
The system allows adding products to a basket and calculates the total cost considering delivery charges and offers.

## Usage:

1. Set up the product catalogue, delivery charge rules, and offers in the index.php file.
2. Create a new Basket instance by passing the product catalogue, delivery charge rules, and offers.
3. Add products to the basket using the `add` method.
4. Retrieve the total cost using the `total` method, considering delivery charges and offers.

## Assumptions Made:

1. Product catalogue is defined as an associative array with product codes as keys and price information.
2. Delivery charge rules are defined as an array of associative arrays with 'limit' and 'charge' keys.
3. The offer "buy one red widget, get the second half price" applies only to red widgets.
4. The basket system assumes correct input values and does not perform extensive error handling.

## To Run:

1. Modify the product catalogue, delivery charge rules, and offers in the index.php file.
2. Run the index.php file in a PHP-enabled environment (e.g., a web server or command line).

### Note:

This is a simplified proof of concept and might not cover all possible use cases or edge cases. It provides a basic structure for implementing the specified requirements.
