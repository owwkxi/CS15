class LoadWallet:
    """Store subscriber details and manage prepaid load transactions."""

    SERVICE_FEE = 5.00

    def __init__(
        self, owner_name: str, mobile_number: str, starting_balance: float
    ) -> None:
        self.owner_name = owner_name
        self.mobile_number = mobile_number
        self.balance = starting_balance

    def top_up(self, amount: float) -> None:
        """Add load to the wallet."""
        if amount <= 0:
            print("Top-up amount must be greater than zero.")
            return

        self.balance += amount
        print(f"New balance: P{self.balance:.2f}")

    def send_load(self, recipient_number: str, amount: float) -> None:
        """Send load to a number on the same network."""
        if amount <= 0:
            print("Load amount must be greater than zero.")
        elif amount > self.balance:
            print("Insufficient balance.")
        else:
            self.balance -= amount
            print(f"P{amount:.2f} load sent to {recipient_number}.")
            print(f"New balance: P{self.balance:.2f}")

    def show_balance(self) -> None:
        """Display the wallet owner, number, and current balance."""
        print(f"Owner        : {self.owner_name}")
        print(f"Mobile Number: {self.mobile_number}")
        print(f"Balance      : P{self.balance:.2f}")

    def send_with_fee(self, recipient_number: str, amount: float) -> None:
        """Send load to another network and charge the service fee."""
        total_cost = amount + self.SERVICE_FEE

        if amount <= 0:
            print("Load amount must be greater than zero.")
        elif total_cost > self.balance:
            print(
                f"Insufficient balance. The load plus P{self.SERVICE_FEE:.2f} "
                "fee is required."
            )
        else:
            self.balance -= total_cost
            print(f"P{amount:.2f} load sent to {recipient_number}.")
            print(f"Service fee: P{self.SERVICE_FEE:.2f}")
            print(f"New balance: P{self.balance:.2f}")
