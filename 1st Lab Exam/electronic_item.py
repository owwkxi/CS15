from item import Item


class ElectronicItem(Item):
    def __init__(
        self, name: str, quantity: int, price: float, warranty_months: int
    ) -> None:
        super().__init__(name, quantity, price)
        if warranty_months < 0:
            raise ValueError("Warranty cannot be negative.")
        self.warranty_months = warranty_months

    def display(self) -> None:
        super().display()
        print(f"Warranty: {self.warranty_months} month(s)")
