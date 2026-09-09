class Dog:
    def __init__(self, name: str, age: int) -> None:
        self.name = name
        self.age = age

    def bark(self) -> None:
        print("Woof! Woof!")

    def celebrate_birthday(self) -> None:
        self.age += 1
        print(f"Happy Birthday! {self.name} is now {self.age} years old.")

    def get_info(self) -> str:
        return f"Dog Name: {self.name}, Age: {self.age}"


if __name__ == "__main__":
    dog = Dog("Max", 5)
    dog.bark()
    dog.celebrate_birthday()
    print(dog.get_info())
