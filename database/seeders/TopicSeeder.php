<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Picture mapping:
        // Module 1: Intro to OOP, Classes/Objects, Fields
        // Module 2: Methods & Constructors
        // Module 3: Inheritance & Polymorphism (and closely related abstraction/interfaces)
        $topics = [
            // ===== Module 1 =====
            [
                'title' => 'Introduction to C# OOP',
                'content' => 'Object-Oriented Programming (OOP) in C# is a way of designing software around objects. Objects combine data (fields/properties) and behavior (methods). This makes programs easier to understand, test, and extend. 
Example:
public class Car {
    public string Brand;
    public void Drive() {
        Console.WriteLine("The car is driving...");
    }
}
Car myCar = new Car(); // create object
myCar.Brand = "Toyota";
myCar.Drive();',
                'order' => 1,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Classes and Objects',
                'content' => 'A class is a blueprint for creating objects, and an object is an instance of a class. Classes define structure, while objects bring them to life.
Example:
public class Dog {
    public string Name;
    public void Bark() {
        Console.WriteLine(Name + " is barking!");
    }
}
Dog d = new Dog();
d.Name = "Buddy";
d.Bark(); // Buddy is barking!',
                'order' => 2,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Fields and Properties',
                'content' => 'Fields are variables inside a class that hold data. Properties act as controlled accessors (getters/setters) to fields. This provides encapsulation and validation. 
Example:
public class BankAccount {
    private double balance;
    public double Balance {
        get { return balance; }
        set {
            if (value >= 0) balance = value;
        }
    }
}
BankAccount acc = new BankAccount();
acc.Balance = 1000;',
                'order' => 3,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Access Modifiers',
                'content' => 'Access modifiers control visibility of classes and members:
- public: accessible anywhere
- private: inside class only
- protected: class + derived classes
- internal: same assembly only
- protected internal: derived OR same assembly
Example:
public class Example {
    private int hidden;
    public int Visible;
}',
                'order' => 7,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Encapsulation',
                'content' => 'Encapsulation means bundling data and methods inside a class, while hiding implementation details. This protects data from unauthorized access. 
Example:
public class Person {
    private int age;
    public void SetAge(int a) {
        if (a > 0) age = a;
    }
    public int GetAge() {
        return age;
    }
}',
                'order' => 8,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Static Members',
                'content' => 'Static members belong to the class itself rather than an instance. Useful for shared utilities. 
Example:
public class MathUtils {
    public static double Pi = 3.14;
    public static int Square(int x) {
        return x * x;
    }
}
Console.WriteLine(MathUtils.Square(5));',
                'order' => 13,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Partial Classes',
                'content' => 'Partial classes allow splitting a class definition across multiple files. This is useful for organizing large projects. 
Example:
// File1.cs
public partial class Person {
    public string Name;
}
// File2.cs
public partial class Person {
    public void Speak() { Console.WriteLine("Hello!"); }
}',
                'order' => 15,
                'category' => 'Module 1',
            ],
            [
                'title' => 'Nested Classes',
                'content' => 'A class defined inside another class is called a nested class. It is used to group classes logically. 
Example:
public class Outer {
    public class Inner {
        public void Display() { Console.WriteLine("I am inner class"); }
    }
}',
                'order' => 16,
                'category' => 'Module 1',
            ],

            // ===== Module 2 =====
            [
                'title' => 'Methods',
                'content' => 'Methods define actions/behaviors of objects. They may take parameters and return values. 
Example:
public class Calculator {
    public int Add(int a, int b) {
        return a + b;
    }
}
Calculator c = new Calculator();
Console.WriteLine(c.Add(3, 4)); // Output: 7',
                'order' => 4,
                'category' => 'Module 2',
            ],
            [
                'title' => 'Constructors',
                'content' => 'Constructors are special methods that initialize objects automatically. They can take parameters to set initial values. 
Example:
public class Student {
    public string Name;
    public Student(string name) {
        Name = name;
    }
}
Student s = new Student("John");
Console.WriteLine(s.Name);',
                'order' => 5,
                'category' => 'Module 2',
            ],
            [
                'title' => 'Destructors',
                'content' => 'Destructors clean up resources when an object is destroyed. In C#, the Garbage Collector manages memory, but destructors are used for unmanaged resources. 
Example:
public class FileHandler {
    ~FileHandler() {
        Console.WriteLine("Destructor called...");
    }
}',
                'order' => 6,
                'category' => 'Module 2',
            ],

            // ===== Module 3 =====
            [
                'title' => 'Inheritance',
                'content' => 'Inheritance allows one class to reuse code from another. The derived class extends the base class and can add its own behavior.
Example:
public class Animal {
    public void Eat() { Console.WriteLine("Eating..."); }
}
public class Dog : Animal {
    public void Bark() { Console.WriteLine("Barking..."); }
}
Dog d = new Dog();
d.Eat();
d.Bark();',
                'order' => 9,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Polymorphism',
                'content' => 'Polymorphism means "many forms". It allows a method to have different implementations in derived classes. 
Example:
public class Shape {
    public virtual void Draw() { Console.WriteLine("Drawing shape"); }
}
public class Circle : Shape {
    public override void Draw() { Console.WriteLine("Drawing circle"); }
}
Shape s = new Circle();
s.Draw();',
                'order' => 10,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Abstract Classes',
                'content' => 'Abstract classes provide a base for other classes but cannot be instantiated. They may include abstract methods that must be implemented in derived classes. 
Example:
public abstract class Animal {
    public abstract void MakeSound();
}
public class Dog : Animal {
    public override void MakeSound() {
        Console.WriteLine("Bark");
    }
}',
                'order' => 11,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Interfaces',
                'content' => 'Interfaces define contracts (methods/properties) that classes must implement. They enable multiple inheritance-like behavior. 
Example:
public interface IAnimal {
    void Speak();
}
public class Cat : IAnimal {
    public void Speak() { Console.WriteLine("Meow"); }
}',
                'order' => 12,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Sealed Classes',
                'content' => 'A sealed class cannot be inherited. It is useful when you want to prevent further extension. 
Example:
public sealed class FinalClass {
    public void Show() { Console.WriteLine("No inheritance allowed"); }
}',
                'order' => 14,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Generics',
                'content' => 'Generics allow type-safe data structures and methods. They let you write reusable code without sacrificing performance. 
Example:
public class Box<T> {
    public T Value;
}
Box<int> b = new Box<int>();
b.Value = 10;',
                'order' => 17,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Delegates',
                'content' => 'Delegates are type-safe function pointers. They let you pass methods as parameters. 
Example:
public delegate void Greet(string name);
public class Program {
    static void SayHello(string n) { Console.WriteLine("Hello " + n); }
    static void Main() {
        Greet g = SayHello;
        g("John");
    }
}',
                'order' => 18,
                'category' => 'Module 3',
            ],
            [
                'title' => 'Events',
                'content' => 'Events are built on delegates and are used for signaling actions (publish/subscribe). 
Example:
public class Button {
    public event Action Clicked;
    public void Click() {
        if (Clicked != null) Clicked();
    }
}
Button b = new Button();
b.Clicked += () => Console.WriteLine("Button clicked!");
b.Click();',
                'order' => 19,
                'category' => 'Module 3',
            ],
            [
                'title' => 'LINQ Basics',
                'content' => 'LINQ (Language Integrated Query) is used for querying collections with SQL-like syntax in C#. 
Example:
int[] nums = { 1, 2, 3, 4, 5 };
var evens = from n in nums
            where n % 2 == 0
            select n;
foreach (var e in evens) {
    Console.WriteLine(e);
}',
                'order' => 20,
                'category' => 'Module 3',
            ],
        ];

        foreach ($topics as &$t) {
            $t['created_at'] = $now;
            $t['updated_at'] = $now;
        }

        DB::table('topics')->insert($topics);
    }
}
