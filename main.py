from load_wallet import LoadWallet


def read_amount(prompt: str) -> float:
    """Read a valid non-negative peso amount from the user."""
    while True:
        try:
            amount = float(input(prompt).strip().lstrip("Pp"))
            if amount < 0:
                raise ValueError
            return amount
        except ValueError:
            print("Please enter a valid non-negative amount.")


def main() -> None:
    """Run the interactive cellphone load wallet menu."""
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
            wallet.send_load(recipient, read_amount("Enter load amount: P"))
        elif choice == "3":
            recipient = input("Enter recipient mobile number: ").strip()
            wallet.send_with_fee(recipient, read_amount("Enter load amount: P"))
        elif choice == "4":
            wallet.show_balance()
        elif choice == "5":
            print("Thank you for using the Cellphone Load Wallet.")
            break
        else:
            print("Invalid option. Please choose a number from 1 to 5.")


if __name__ == "__main__":
    main()
