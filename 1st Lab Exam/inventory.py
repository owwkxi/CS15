from typing import Optional

from item import Item


class Inventory:
    def __init__(self) -> None:
        self.items: list[Item] = []

    def add_item(self, item: Item) -> bool:
        if self.search(item.name) is not None:
            return False
        self.items.append(item)
        return True

    def update_quantity(self, name: str, quantity: int) -> bool:
        item = self.search(name)
        if item is None or quantity < 0:
            return False
        item._set_quantity(quantity)
        return True

    def search(self, name: str) -> Optional[Item]:
        name = name.strip().lower()
        return next((item for item in self.items if item.name.lower() == name), None)

    def display_all(self) -> None:
        if not self.items:
            print("Inventory is empty.")
            return
        for item in self.items:
            item.display()

    def total_inventory_value(self) -> float:
        return sum(item.total_value() for item in self.items)
