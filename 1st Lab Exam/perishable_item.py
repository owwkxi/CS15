from item import Item


class PerishableItem(Item):
    def __init__(
        self, name: str, quantity: int, price: float, days_until_expiry: int
    ) -> None:
        super().__init__(name, quantity, price)
        if days_until_expiry < 0:
            raise ValueError("Days until expiry cannot be negative.")
        self.days_until_expiry = days_until_expiry

    def total_value(self) -> float:
        value = super().total_value()
        return value * 0.5 if self.days_until_expiry <= 3 else value

    def is_expiring_soon(self) -> bool:
        return self.days_until_expiry <= 3
