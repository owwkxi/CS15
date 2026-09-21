from electronic_item import ElectronicItem
from inventory import Inventory
from perishable_item import PerishableItem


def read_int(prompt: str, minimum: int = 0) -> int:
    while True:
        try:
            value = int(input(prompt).strip())
            if value < minimum:
                raise ValueError
            return value
        except ValueError:
            print(f"Enter a whole number of at least {minimum}.")


def read_float(prompt: str, minimum: float = 0) -> float:
    while True:
        try:
            value = float(input(prompt).strip())
            if value < minimum:
                raise ValueError
            return value
        except ValueError:
            print(f"Enter a number of at least {minimum}.")


def add_item(inventory: Inventory) -> None:
    name = input("Item name: ").strip()
    if not name:
        print("Item name cannot be empty.")
        return

    quantity = read_int("Quantity: ")
    price = read_float("Price: ")
    item_type = input("Type (1-Perishable, 2-Electronic): ").strip()

    try:
        if item_type == "1":
            item = PerishableItem(name, quantity, price, read_int("Days until expiry: "))
        elif item_type == "2":
            item = ElectronicItem(name, quantity, price, read_int("Warranty months: "))
        else:
            print("Invalid item type.")
            return
    except ValueError as error:
        print(error)
        return

    print("Item added." if inventory.add_item(item) else "Duplicate item name.")


def main() -> None:
    inventory = Inventory()

    while True:
        print(
            "\nMENU\n"
            "1. Add item\n"
            "2. Restock\n"
            "3. Sell\n"
            "4. Search\n"
            "5. Display all items\n"
            "6. Show total inventory value\n"
            "7. Exit"
        )
        choice = input("Choose an option (1-7): ").strip()

        if choice == "1":
            add_item(inventory)
        elif choice in {"2", "3"}:
            item = inventory.search(input("Item name: "))
            if item is None:
                print("Item not found.")
            else:
                quantity = read_int("Quantity: ", 1)
                success = item.restock(quantity) if choice == "2" else item.sell(quantity)
                print("Transaction completed." if success else "Not enough stock.")
        elif choice == "4":
            item = inventory.search(input("Item name: "))
            item.display() if item else print("Item not found.")
        elif choice == "5":
            inventory.display_all()
        elif choice == "6":
            print(f"Total inventory value: P{inventory.total_inventory_value():.2f}")
        elif choice == "7":
            print("Goodbye.")
            break
        else:
            print("Invalid option. Choose 1 to 7.")


if __name__ == "__main__":
    main()