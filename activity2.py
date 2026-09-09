class LoadWallet:

    SERVICE_FEE = 5.00

    def __init__(self, owner_name, mobile_number, starting_balance):
        self.owner_name = owner_name
        self.mobile_number = mobile_number
        self.balance = starting_balance

    def top_up(self, amount):
        if amount <= 0:
            print("Top-up amount must be greater than zero.")
            return

        self.balance += amount
        print(f"New balance: P{self.balance:.2f}")

    def send_load(self, recipient_number, amount):
        if amount <= 0:
            print("Load amount must be greater than zero.")
        elif amount > self.balance:
            print("Insufficient balance.")
        else:
            self.balance -= amount
            print(f"P{amount:.2f} load sent to {recipient_number}.")
            print(f"New balance: P{self.balance:.2f}")

    def show_balance(self):
        print(f"Owner        : {self.owner_name}")
        print(f"Mobile Number: {self.mobile_number}")
        print(f"Balance      : P{self.balance:.2f}")

    def send_with_fee(self, recipient_number, amount):
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


def read_amount(prompt):
    while True:
        try:
            amount = float(input(prompt).strip().lstrip("Pp"))
            if amount < 0:
                raise ValueError
            return amount
        except ValueError:
            print("Please enter a valid non-negative amount.")


def main():
    print("CELLPHONE LOAD WALLET")
    owner_name = input("Enter owner name: ").strip()
    mobile_number = input("Enter mobile number: ").strip()
    starting_balance = read_amount("Enter starting balance: P")
    wallet = LoadWallet(owner_name, mobile_number, starting_balance)

    while True:
        print("\nMENU")
        print("1. Top Up Load")
        print("2. Send Load (same network)")
        print("3. Send Load (other network, with fee)")
        print("4. Show Balance")
        print("5. Exit")

        choice = input("\nChoose an option (1-5): ").strip()

        if choice == "1":
            wallet.top_up(read_amount("Enter top-up amount: P"))
        elif choice == "2":
            recipient = input("Enter recipient mobile number: ").strip()
            amount = read_amount("Enter load amount: P")
            wallet.send_load(recipient, amount)
        elif choice == "3":
            recipient = input("Enter recipient mobile number: ").strip()
            amount = read_amount("Enter load amount: P")
            wallet.send_with_fee(recipient, amount)
        elif choice == "4":
            wallet.show_balance()
        elif choice == "5":
            print("Thank you for using the Cellphone Load Wallet.")
            break
        else:
            print("Invalid option. Please choose a number from 1 to 5.")


if __name__ == "__main__":
    main()