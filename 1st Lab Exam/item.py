class Item:
    def __init__(self, name: str, quantity: int, price: float) -> None:
        self.name = name
        self.__quantity = 0
        self.__price = 0.0
        self._set_quantity(quantity)
        self._set_price(price)

    @property
    def quantity(self) -> int:
        return self.__quantity

    @property
    def price(self) -> float:
        return self.__price

    def _set_quantity(self, quantity: int) -> None:
        if quantity < 0:
            raise ValueError("Quantity cannot be negative.")
        self.__quantity = quantity

    def _set_price(self, price: float) -> None:
        if price < 0:
            raise ValueError("Price cannot be negative.")
        self.__price = price

    def restock(self, quantity: int) -> bool:
        if quantity < 0:
            return False
        self.__quantity += quantity
        return True

    def sell(self, quantity: int) -> bool:
        if quantity < 0 or quantity > self.__quantity:
            return False
        self.__quantity -= quantity
        return True

    def total_value(self) -> float:
        return self.quantity * self.price

    def display(self) -> None:
        print(
            f"Name: {self.name} | Quantity: {self.quantity} | "
            f"Price: P{self.price:.2f} | Total: P{self.total_value():.2f}"
        )