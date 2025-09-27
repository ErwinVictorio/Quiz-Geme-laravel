<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $now = now();

        $quizIds = [
            'intro'        => 1,
            'classes'      => 2,
            'fpm'          => 3,
            'ctors'        => 4,
            'access'       => 5,
             'static'     => 6,
            'inherit'    => 7,
            'poly'       => 8,
            'abstract'   => 9,
            'interfaces' => 10,
             'delegates'   => 11,
            'events'      => 12,
            'exceptions'  => 13,
            'collections' => 14,
            'linq'        => 15,
             'async'       => 16,
            'fileio'      => 17,
            'attributes'  => 18,
            'di'          => 19,
            'testing'     => 20,
        ];

        $rows = [

            // ================================
            // 1) Introduction to OOP
            // ================================
            ['quiz_id'=>$quizIds['intro'],'order'=>1,'text'=>'What does OOP stand for?','choices'=>['A'=>'Object-Oriented Programming','B'=>'Open Operating Platform','C'=>'Ordered Object Process','D'=>'Operational Oriented Process'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>2,'text'=>'Which is NOT a principle of OOP?','choices'=>['A'=>'Encapsulation','B'=>'Inheritance','C'=>'Recursion','D'=>'Polymorphism'],'correct'=>'C','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>3,'text'=>'Which of these describes Abstraction?','choices'=>['A'=>'Hiding implementation details','B'=>'Copying code','C'=>'Making variables global','D'=>'Optimizing loops'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>4,'text'=>'An Object in OOP is…','choices'=>['A'=>'A blueprint','B'=>'An instance of a class','C'=>'A static function','D'=>'A library'],'correct'=>'B','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>5,'text'=>'Encapsulation means…','choices'=>['A'=>'Bundling data & methods','B'=>'Encrypting code','C'=>'Making code global','D'=>'Faster loops'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>6,'text'=>'Which OOP principle allows reusability?','choices'=>['A'=>'Inheritance','B'=>'Encapsulation','C'=>'Polymorphism','D'=>'Abstraction'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>7,'text'=>'Polymorphism means…','choices'=>['A'=>'Many forms','B'=>'One form','C'=>'No form','D'=>'Static typing'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>8,'text'=>'Which keyword is used to define a class in C#?','choices'=>['A'=>'define','B'=>'class','C'=>'struct','D'=>'object'],'correct'=>'B','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>9,'text'=>'What are the two main parts of an object?','choices'=>['A'=>'State & behavior','B'=>'Table & row','C'=>'Stack & queue','D'=>'Loop & condition'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['intro'],'order'=>10,'text'=>'Which of these is an advantage of OOP?','choices'=>['A'=>'Code reusability','B'=>'Harder debugging','C'=>'More duplication','D'=>'Tightly coupled code'],'correct'=>'A','points'=>1],

            // ================================
            // 2) Classes and Objects
            // ================================
            ['quiz_id'=>$quizIds['classes'],'order'=>1,'text'=>'A class is best described as…','choices'=>['A'=>'Blueprint/template','B'=>'Running program','C'=>'SQL Table','D'=>'Compiler'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>2,'text'=>'An object is…','choices'=>['A'=>'An instance of a class','B'=>'A comment','C'=>'A thread','D'=>'A library'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>3,'text'=>'Which keyword creates an object in C#?','choices'=>['A'=>'new','B'=>'create','C'=>'init','D'=>'instance'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>4,'text'=>'Objects of the same class share…','choices'=>['A'=>'Same structure','B'=>'Same values','C'=>'No commonality','D'=>'Same memory'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>5,'text'=>'What is the default accessibility of class members?','choices'=>['A'=>'private','B'=>'public','C'=>'protected','D'=>'internal'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>6,'text'=>'Can a class contain another class?','choices'=>['A'=>'Yes, nested class','B'=>'No','C'=>'Only in SQL','D'=>'Only in XML'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>7,'text'=>'What is created when a class is instantiated?','choices'=>['A'=>'Object','B'=>'Namespace','C'=>'Project','D'=>'Library'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>8,'text'=>'Which keyword refers to the current object?','choices'=>['A'=>'this','B'=>'self','C'=>'me','D'=>'own'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>9,'text'=>'Which runs automatically when an object is created?','choices'=>['A'=>'Constructor','B'=>'Destructor','C'=>'Main()','D'=>'Method'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['classes'],'order'=>10,'text'=>'What keyword prevents instantiation of a class?','choices'=>['A'=>'abstract','B'=>'sealed','C'=>'static','D'=>'const'],'correct'=>'C','points'=>1],

            // ================================
            // 3) Fields, Properties, Methods
            // ================================
            ['quiz_id'=>$quizIds['fpm'],'order'=>1,'text'=>'A field is…','choices'=>['A'=>'Variable that stores object data','B'=>'External module','C'=>'SQL row','D'=>'Loop construct'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>2,'text'=>'A property commonly provides…','choices'=>['A'=>'Getters/setters around a field','B'=>'Direct DB access','C'=>'Network sockets','D'=>'OS interrupts'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>3,'text'=>'A method is…','choices'=>['A'=>'A behavior/function on the object','B'=>'A project name','C'=>'A comment block','D'=>'A file path'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>4,'text'=>'Which is a good reason to use a property instead of a field?','choices'=>['A'=>'To add validation logic','B'=>'To disable OOP','C'=>'To rename the class','D'=>'To speed up loops'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>5,'text'=>'Which C# member grouping is correct?','choices'=>['A'=>'Fields = data, Methods = behavior','B'=>'Fields = HTTP only','C'=>'Methods = SQL only','D'=>'Properties = events'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>6,'text'=>'Auto-implemented properties use which keyword?','choices'=>['A'=>'get; set;','B'=>'fetch; update;','C'=>'read; write;','D'=>'property'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>7,'text'=>'Which can be private or public?','choices'=>['A'=>'Fields & properties','B'=>'Only fields','C'=>'Only properties','D'=>'Only methods'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>8,'text'=>'Which is true for static fields?','choices'=>['A'=>'Shared across all objects','B'=>'Unique per object','C'=>'Must be private','D'=>'Cannot be used'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>9,'text'=>'Which is true about methods?','choices'=>['A'=>'Can return a value','B'=>'Must always return void','C'=>'Cannot have parameters','D'=>'Run only once'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fpm'],'order'=>10,'text'=>'Which is valid C# syntax?','choices'=>['A'=>'public int Age {get; set;}','B'=>'field int Age','C'=>'property Age=10','D'=>'define Age'],'correct'=>'A','points'=>1],

            // ================================
            // 4) Constructors & Destructors
            // ================================
            ['quiz_id'=>$quizIds['ctors'],'order'=>1,'text'=>'A constructor…','choices'=>['A'=>'Initializes objects','B'=>'Deletes objects','C'=>'Prints objects','D'=>'Compiles code'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>2,'text'=>'Constructor name must…','choices'=>['A'=>'Match the class name','B'=>'Be "init"','C'=>'Start with Get','D'=>'Be unique globally'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>3,'text'=>'In C#, destructors are rarely used because…','choices'=>['A'=>'Garbage collector cleans up','B'=>'C# forbids them','C'=>'They run every second','D'=>'There is no memory'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>4,'text'=>'What can constructors accept?','choices'=>['A'=>'Parameters for initialization','B'=>'Return values','C'=>'SQL only','D'=>'Events'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>5,'text'=>'Which is true about constructors?','choices'=>['A'=>'Run when creating objects','B'=>'Have return type','C'=>'Run manually','D'=>'Optional only'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>6,'text'=>'Which keyword prevents constructor chaining?','choices'=>['A'=>'private','B'=>'sealed','C'=>'base','D'=>'static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>7,'text'=>'Static constructors…','choices'=>['A'=>'Initialize static data','B'=>'Run per object','C'=>'Have parameters','D'=>'Are public'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>8,'text'=>'A destructor syntax in C# uses…','choices'=>['A'=>'~ClassName()','B'=>'!ClassName()','C'=>'destruct()','D'=>'finalize()'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>9,'text'=>'Can a class have multiple constructors?','choices'=>['A'=>'Yes, overloading','B'=>'No, only one','C'=>'Only static','D'=>'Only private'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['ctors'],'order'=>10,'text'=>'What keyword calls parent constructor?','choices'=>['A'=>'base','B'=>'super','C'=>'parent','D'=>'init'],'correct'=>'A','points'=>1],

            // ================================
            // 5) Access Modifiers
            // ================================
            ['quiz_id'=>$quizIds['access'],'order'=>1,'text'=>'Which allows access from anywhere?','choices'=>['A'=>'public','B'=>'private','C'=>'internal','D'=>'protected'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>2,'text'=>'Which restricts access to the same class?','choices'=>['A'=>'private','B'=>'public','C'=>'internal','D'=>'protected'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>3,'text'=>'Which allows access to derived classes?','choices'=>['A'=>'protected','B'=>'internal','C'=>'public','D'=>'file'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>4,'text'=>'Which allows access within the same assembly?','choices'=>['A'=>'internal','B'=>'public','C'=>'private','D'=>'protected'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>5,'text'=>'"protected internal" means…','choices'=>['A'=>'Derived OR same assembly','B'=>'Derived only','C'=>'Assembly only','D'=>'No access'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>6,'text'=>'What is the most restrictive modifier?','choices'=>['A'=>'private','B'=>'public','C'=>'internal','D'=>'protected'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>7,'text'=>'Which is default for class members?','choices'=>['A'=>'private','B'=>'public','C'=>'internal','D'=>'protected'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>8,'text'=>'Which is default for top-level classes?','choices'=>['A'=>'internal','B'=>'public','C'=>'private','D'=>'protected'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>9,'text'=>'Can access modifiers be combined?','choices'=>['A'=>'Yes, like protected internal','B'=>'No','C'=>'Only private+public','D'=>'Only in Java'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['access'],'order'=>10,'text'=>'Which keyword prevents inheritance?','choices'=>['A'=>'sealed','B'=>'static','C'=>'abstract','D'=>'const'],'correct'=>'A','points'=>1],



             // ================================
            // 6) Static Members
            // ================================
            ['quiz_id'=>$quizIds['static'],'order'=>1,'text'=>'What does the static keyword mean in C#?','choices'=>['A'=>'Shared across all objects','B'=>'Unique per object','C'=>'Temporary','D'=>'Instance only'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>2,'text'=>'Which members can be static?','choices'=>['A'=>'Fields, methods, properties','B'=>'Only fields','C'=>'Only classes','D'=>'None'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>3,'text'=>'A static constructor…','choices'=>['A'=>'Initializes static data','B'=>'Runs every time object is created','C'=>'Takes parameters','D'=>'Can be called manually'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>4,'text'=>'What is true about static classes?','choices'=>['A'=>'Cannot be instantiated','B'=>'Can be inherited','C'=>'Can have constructors','D'=>'Can implement interfaces'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>5,'text'=>'Where is static data stored?','choices'=>['A'=>'In the type itself','B'=>'Per object','C'=>'In SQL','D'=>'In the heap only'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>6,'text'=>'Can a static method access instance members directly?','choices'=>['A'=>'No, needs an object','B'=>'Yes','C'=>'Only in structs','D'=>'Only if public'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>7,'text'=>'Which keyword prevents static usage?','choices'=>['A'=>'abstract','B'=>'sealed','C'=>'const','D'=>'readonly'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>8,'text'=>'What is true about static fields?','choices'=>['A'=>'Shared across all instances','B'=>'Destroyed per object','C'=>'Cannot be used in classes','D'=>'Private only'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>9,'text'=>'When does a static constructor run?','choices'=>['A'=>'Once before first use','B'=>'Every object creation','C'=>'Never','D'=>'Only in debug'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['static'],'order'=>10,'text'=>'Which is correct?','choices'=>['A'=>'static int count;','B'=>'public instance static;','C'=>'static();','D'=>'static class();'],'correct'=>'A','points'=>1],

            // ================================
            // 7) Inheritance
            // ================================
            ['quiz_id'=>$quizIds['inherit'],'order'=>1,'text'=>'Inheritance allows…','choices'=>['A'=>'Code reuse between classes','B'=>'SQL optimization','C'=>'Global variables','D'=>'Thread locking'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>2,'text'=>'Which symbol denotes inheritance in C#?','choices'=>['A'=>':','B'=>'->','C'=>'extends','D'=>'inherits'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>3,'text'=>'Can C# support multiple class inheritance?','choices'=>['A'=>'No, only single','B'=>'Yes, unlimited','C'=>'Yes, but unsafe','D'=>'Yes, with keyword multi'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>4,'text'=>'Which keyword calls parent constructor?','choices'=>['A'=>'base','B'=>'super','C'=>'parent','D'=>'this'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>5,'text'=>'What keyword prevents inheritance?','choices'=>['A'=>'sealed','B'=>'static','C'=>'abstract','D'=>'final'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>6,'text'=>'Which access modifier allows derived classes access?','choices'=>['A'=>'protected','B'=>'private','C'=>'internal','D'=>'public'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>7,'text'=>'What can be inherited?','choices'=>['A'=>'Fields, methods, properties','B'=>'Constructors','C'=>'Destructors','D'=>'Events only'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>8,'text'=>'Which keyword overrides base class methods?','choices'=>['A'=>'override','B'=>'extends','C'=>'replace','D'=>'super'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>9,'text'=>'Which keyword hides base implementation?','choices'=>['A'=>'new','B'=>'override','C'=>'sealed','D'=>'static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['inherit'],'order'=>10,'text'=>'Which is correct?','choices'=>['A'=>'class Dog : Animal {}','B'=>'class Dog extends Animal {}','C'=>'class Dog inherits Animal {}','D'=>'class Dog -> Animal {}'],'correct'=>'A','points'=>1],

            // ================================
            // 8) Polymorphism
            // ================================
            ['quiz_id'=>$quizIds['poly'],'order'=>1,'text'=>'Polymorphism allows…','choices'=>['A'=>'Many forms of methods/objects','B'=>'Only one form','C'=>'No inheritance','D'=>'Static only'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>2,'text'=>'Which keyword enables method overriding?','choices'=>['A'=>'virtual','B'=>'static','C'=>'sealed','D'=>'const'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>3,'text'=>'Which keyword implements runtime polymorphism?','choices'=>['A'=>'override','B'=>'new','C'=>'static','D'=>'sealed'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>4,'text'=>'Compile-time polymorphism is achieved through…','choices'=>['A'=>'Method overloading','B'=>'Inheritance','C'=>'Abstract classes','D'=>'Interfaces'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>5,'text'=>'Runtime polymorphism is achieved through…','choices'=>['A'=>'Method overriding','B'=>'Encapsulation','C'=>'Static fields','D'=>'Loops'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>6,'text'=>'Which keyword prevents method overriding?','choices'=>['A'=>'sealed','B'=>'override','C'=>'virtual','D'=>'static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>7,'text'=>'Which example shows polymorphism?','choices'=>['A'=>'Draw() implemented differently in Shape, Circle, Square','B'=>'One class only','C'=>'Global variables','D'=>'Multiple inheritance'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>8,'text'=>'Which is true about interfaces?','choices'=>['A'=>'Enable polymorphism','B'=>'Prevent inheritance','C'=>'Hide classes','D'=>'Encapsulate loops'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>9,'text'=>'Can operators be overloaded in C#?','choices'=>['A'=>'Yes','B'=>'No','C'=>'Only in C++','D'=>'Only sealed'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['poly'],'order'=>10,'text'=>'Which is NOT polymorphism?','choices'=>['A'=>'Encapsulation','B'=>'Overloading','C'=>'Overriding','D'=>'Interfaces'],'correct'=>'A','points'=>1],

            // ================================
            // 9) Abstract Classes
            // ================================
            ['quiz_id'=>$quizIds['abstract'],'order'=>1,'text'=>'What keyword defines an abstract class?','choices'=>['A'=>'abstract','B'=>'sealed','C'=>'static','D'=>'class'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>2,'text'=>'Can abstract classes be instantiated?','choices'=>['A'=>'No','B'=>'Yes','C'=>'Only with static','D'=>'Only if public'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>3,'text'=>'An abstract method has…','choices'=>['A'=>'No body, must be overridden','B'=>'Always static','C'=>'SQL logic','D'=>'Threading'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>4,'text'=>'Abstract classes may contain…','choices'=>['A'=>'Both abstract and concrete methods','B'=>'Only abstract methods','C'=>'Only constructors','D'=>'No methods'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>5,'text'=>'What keyword overrides abstract methods?','choices'=>['A'=>'override','B'=>'static','C'=>'sealed','D'=>'virtual'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>6,'text'=>'Can abstract classes have constructors?','choices'=>['A'=>'Yes','B'=>'No','C'=>'Only private','D'=>'Only static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>7,'text'=>'Which is true about abstract classes?','choices'=>['A'=>'Cannot be sealed','B'=>'Cannot have fields','C'=>'Must be public','D'=>'Only in Java'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>8,'text'=>'Can abstract classes implement interfaces?','choices'=>['A'=>'Yes','B'=>'No','C'=>'Only static','D'=>'Only sealed'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>9,'text'=>'Which access modifier can abstract methods have?','choices'=>['A'=>'public, protected','B'=>'private','C'=>'internal only','D'=>'none'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['abstract'],'order'=>10,'text'=>'Which is correct?','choices'=>['A'=>'abstract class Shape {public abstract void Draw();}','B'=>'abstract Shape {Draw();}','C'=>'sealed abstract class Shape {}','D'=>'static abstract class'],'correct'=>'A','points'=>1],

            // ================================
            // 10) Interfaces
            // ================================
            ['quiz_id'=>$quizIds['interfaces'],'order'=>1,'text'=>'What keyword defines an interface in C#?','choices'=>['A'=>'interface','B'=>'implements','C'=>'protocol','D'=>'abstract'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>2,'text'=>'Can interfaces contain method bodies (before C# 8)?','choices'=>['A'=>'No','B'=>'Yes','C'=>'Only private','D'=>'Only if abstract'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>3,'text'=>'Interfaces are used for…','choices'=>['A'=>'Contracts for classes','B'=>'SQL queries','C'=>'Thread safety','D'=>'Encapsulation'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>4,'text'=>'A class implements an interface using…','choices'=>['A'=>':','B'=>'implements','C'=>'extends','D'=>'with'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>5,'text'=>'Can a class implement multiple interfaces?','choices'=>['A'=>'Yes','B'=>'No','C'=>'Only one','D'=>'Only in Java'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>6,'text'=>'Do interface members have access modifiers by default?','choices'=>['A'=>'No, always public','B'=>'Yes, private','C'=>'Yes, internal','D'=>'Depends'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>7,'text'=>'Which is true?','choices'=>['A'=>'Interfaces cannot store fields','B'=>'Interfaces store values','C'=>'Interfaces auto implement','D'=>'Interfaces run methods'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>8,'text'=>'What happens if a class doesn’t implement all interface methods?','choices'=>['A'=>'Compiler error','B'=>'Runtime warning','C'=>'Nothing','D'=>'Ignored'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>9,'text'=>'Can interfaces inherit other interfaces?','choices'=>['A'=>'Yes','B'=>'No','C'=>'Only static','D'=>'Only sealed'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['interfaces'],'order'=>10,'text'=>'Which is correct?','choices'=>['A'=>'class Dog : IAnimal {}','B'=>'class Dog implements IAnimal {}','C'=>'class Dog with IAnimal {}','D'=>'class Dog -> IAnimal {}'],'correct'=>'A','points'=>1],



             // ================================
            // 11) Delegates
            // ================================
            ['quiz_id'=>$quizIds['delegates'],'order'=>1,'text'=>'What is a delegate in C#?','choices'=>['A'=>'Type-safe function pointer','B'=>'Global variable','C'=>'Database link','D'=>'Thread manager'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>2,'text'=>'Which keyword defines a delegate?','choices'=>['A'=>'delegate','B'=>'func','C'=>'action','D'=>'pointer'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>3,'text'=>'Which built-in delegate returns void?','choices'=>['A'=>'Action','B'=>'Func','C'=>'Predicate','D'=>'None'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>4,'text'=>'Which built-in delegate returns a value?','choices'=>['A'=>'Func','B'=>'Action','C'=>'EventHandler','D'=>'Thread'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>5,'text'=>'Which built-in delegate returns bool?','choices'=>['A'=>'Predicate<T>','B'=>'Func<bool>','C'=>'Action','D'=>'Event'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>6,'text'=>'Delegates are commonly used for…','choices'=>['A'=>'Callbacks','B'=>'Tables','C'=>'Exceptions','D'=>'Inheritance'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>7,'text'=>'Anonymous methods can be assigned to…','choices'=>['A'=>'Delegates','B'=>'Variables','C'=>'Enums','D'=>'Constants'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>8,'text'=>'What feature replaced anonymous delegates in C# 3.0?','choices'=>['A'=>'Lambdas','B'=>'Events','C'=>'Threads','D'=>'Structs'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>9,'text'=>'Which keyword combines multiple delegates?','choices'=>['A'=>'+=','B'=>'=','C'=>'->','D'=>'::'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['delegates'],'order'=>10,'text'=>'Which is true about multicast delegates?','choices'=>['A'=>'They can hold references to multiple methods','B'=>'They hold only one method','C'=>'They are obsolete','D'=>'They run in parallel'],'correct'=>'A','points'=>1],

            // ================================
            // 12) Events
            // ================================
            ['quiz_id'=>$quizIds['events'],'order'=>1,'text'=>'Events in C# are based on…','choices'=>['A'=>'Delegates','B'=>'Threads','C'=>'Exceptions','D'=>'LINQ'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>2,'text'=>'Which keyword defines an event?','choices'=>['A'=>'event','B'=>'delegate','C'=>'trigger','D'=>'signal'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>3,'text'=>'Events support which design pattern?','choices'=>['A'=>'Observer','B'=>'Factory','C'=>'Builder','D'=>'Singleton'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>4,'text'=>'Which built-in delegate type is often used for events?','choices'=>['A'=>'EventHandler','B'=>'Action','C'=>'Func','D'=>'Predicate'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>5,'text'=>'Which operator is used to subscribe to events?','choices'=>['A'=>'+=','B'=>'=','C'=>'::','D'=>'->'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>6,'text'=>'Which operator is used to unsubscribe from events?','choices'=>['A'=>'-=','B'=>'=','C'=>'!=','D'=>'<>'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>7,'text'=>'Can events be declared static?','choices'=>['A'=>'Yes','B'=>'No','C'=>'Only in structs','D'=>'Only with sealed'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>8,'text'=>'What does EventArgs.Empty represent?','choices'=>['A'=>'No event data','B'=>'Null event','C'=>'Empty delegate','D'=>'Invalid'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>9,'text'=>'Which access modifier allows raising an event inside the class only?','choices'=>['A'=>'private','B'=>'public','C'=>'protected','D'=>'internal'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['events'],'order'=>10,'text'=>'Which is correct syntax?','choices'=>['A'=>'public event EventHandler Click;','B'=>'event handler Click();','C'=>'delegate event Click;','D'=>'trigger Click;'],'correct'=>'A','points'=>1],

            // ================================
            // 13) Exception Handling
            // ================================
            ['quiz_id'=>$quizIds['exceptions'],'order'=>1,'text'=>'Which keyword handles exceptions?','choices'=>['A'=>'try-catch','B'=>'if-else','C'=>'while','D'=>'loop'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>2,'text'=>'Which block always executes?','choices'=>['A'=>'finally','B'=>'catch','C'=>'try','D'=>'throw'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>3,'text'=>'Which keyword is used to raise exceptions?','choices'=>['A'=>'throw','B'=>'raise','C'=>'error','D'=>'new'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>4,'text'=>'All exceptions in C# derive from…','choices'=>['A'=>'System.Exception','B'=>'System.Error','C'=>'System.Throw','D'=>'System.Crash'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>5,'text'=>'Which exception occurs when accessing null?','choices'=>['A'=>'NullReferenceException','B'=>'IndexOutOfRangeException','C'=>'InvalidCastException','D'=>'OverflowException'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>6,'text'=>'What is the purpose of custom exceptions?','choices'=>['A'=>'Domain-specific errors','B'=>'Faster loops','C'=>'Memory cleanup','D'=>'Thread safety'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>7,'text'=>'Which exception occurs when dividing by zero?','choices'=>['A'=>'DivideByZeroException','B'=>'NullReferenceException','C'=>'OverflowException','D'=>'ArithmeticException'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>8,'text'=>'Which block should contain cleanup code?','choices'=>['A'=>'finally','B'=>'catch','C'=>'throw','D'=>'using'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>9,'text'=>'Which keyword rethrows the current exception?','choices'=>['A'=>'throw','B'=>'raise','C'=>'continue','D'=>'retry'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['exceptions'],'order'=>10,'text'=>'Which is best practice?','choices'=>['A'=>'Catch specific exceptions','B'=>'Always catch Exception','C'=>'Ignore exceptions','D'=>'Throw strings'],'correct'=>'A','points'=>1],

            // ================================
            // 14) Collections & Generics
            // ================================
            ['quiz_id'=>$quizIds['collections'],'order'=>1,'text'=>'Which namespace contains generic collections?','choices'=>['A'=>'System.Collections.Generic','B'=>'System.Data','C'=>'System.Linq','D'=>'System.IO'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>2,'text'=>'Which collection is key-value based?','choices'=>['A'=>'Dictionary','B'=>'List','C'=>'Stack','D'=>'Queue'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>3,'text'=>'Which collection is FIFO?','choices'=>['A'=>'Queue','B'=>'Stack','C'=>'List','D'=>'Dictionary'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>4,'text'=>'Which collection is LIFO?','choices'=>['A'=>'Stack','B'=>'Queue','C'=>'List','D'=>'Dictionary'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>5,'text'=>'Which generic type defines a list of items?','choices'=>['A'=>'List<T>','B'=>'ArrayList','C'=>'Dictionary<K,V>','D'=>'Queue'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>6,'text'=>'Which generic type ensures unique keys?','choices'=>['A'=>'Dictionary','B'=>'List','C'=>'Stack','D'=>'Array'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>7,'text'=>'Which ensures type safety at compile time?','choices'=>['A'=>'Generics','B'=>'ArrayList','C'=>'Hashtable','D'=>'Dynamic'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>8,'text'=>'Which collection allows duplicate values?','choices'=>['A'=>'List','B'=>'Dictionary','C'=>'HashSet','D'=>'SortedSet'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>9,'text'=>'Which collection provides stack behavior?','choices'=>['A'=>'Push/Pop','B'=>'Enqueue/Dequeue','C'=>'Add/Remove','D'=>'Key/Value'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['collections'],'order'=>10,'text'=>'Which collection is ordered and indexed?','choices'=>['A'=>'List','B'=>'Dictionary','C'=>'Queue','D'=>'Stack'],'correct'=>'A','points'=>1],

            // ================================
            // 15) LINQ
            // ================================
            ['quiz_id'=>$quizIds['linq'],'order'=>1,'text'=>'What does LINQ stand for?','choices'=>['A'=>'Language Integrated Query','B'=>'Local Integer Query','C'=>'Logical Indexed Queue','D'=>'Layered Input Query'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>2,'text'=>'Which namespace is needed for LINQ?','choices'=>['A'=>'System.Linq','B'=>'System.Data','C'=>'System.Collections','D'=>'System.IO'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>3,'text'=>'Which LINQ method filters data?','choices'=>['A'=>'Where','B'=>'Select','C'=>'OrderBy','D'=>'Join'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>4,'text'=>'Which LINQ method projects data?','choices'=>['A'=>'Select','B'=>'Where','C'=>'OrderBy','D'=>'GroupBy'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>5,'text'=>'Which LINQ method sorts ascending?','choices'=>['A'=>'OrderBy','B'=>'OrderByDescending','C'=>'ThenByDescending','D'=>'Sort'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>6,'text'=>'Which LINQ method groups data?','choices'=>['A'=>'GroupBy','B'=>'Select','C'=>'Join','D'=>'Where'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>7,'text'=>'Which LINQ method joins collections?','choices'=>['A'=>'Join','B'=>'Where','C'=>'Select','D'=>'Take'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>8,'text'=>'Which LINQ method returns first element?','choices'=>['A'=>'First','B'=>'Single','C'=>'Take','D'=>'Any'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>9,'text'=>'Which LINQ method checks if any element matches?','choices'=>['A'=>'Any','B'=>'All','C'=>'Contains','D'=>'First'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['linq'],'order'=>10,'text'=>'Which LINQ method returns a boolean if all elements match?','choices'=>['A'=>'All','B'=>'Any','C'=>'Contains','D'=>'Exists'],'correct'=>'A','points'=>1],




              // ================================
            // 16) Asynchronous Programming
            // ================================
            ['quiz_id'=>$quizIds['async'],'order'=>1,'text'=>'Which keywords are used for asynchronous programming in C#?','choices'=>['A'=>'async/await','B'=>'begin/end','C'=>'task/run','D'=>'delay/wait'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>2,'text'=>'What does async modify?','choices'=>['A'=>'A method','B'=>'A class','C'=>'A variable','D'=>'A property'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>3,'text'=>'What does await do?','choices'=>['A'=>'Pauses until task completes','B'=>'Terminates thread','C'=>'Throws exception','D'=>'Creates a delegate'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>4,'text'=>'Async methods usually return…','choices'=>['A'=>'Task or Task<T>','B'=>'void only','C'=>'Thread','D'=>'Event'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>5,'text'=>'Which method simulates non-blocking delay?','choices'=>['A'=>'Task.Delay','B'=>'Thread.Sleep','C'=>'await.Wait','D'=>'Timer.Run'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>6,'text'=>'Which keyword is used for asynchronous streams?','choices'=>['A'=>'await foreach','B'=>'async using','C'=>'yield async','D'=>'foreach async'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>7,'text'=>'Which exception type wraps async errors?','choices'=>['A'=>'AggregateException','B'=>'ThreadException','C'=>'AsyncException','D'=>'TaskException'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>8,'text'=>'What is ConfigureAwait(false) used for?','choices'=>['A'=>'Avoid capturing context','B'=>'Stop all tasks','C'=>'Throw exceptions','D'=>'Force sync'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>9,'text'=>'Which class represents an asynchronous operation?','choices'=>['A'=>'Task','B'=>'Thread','C'=>'Delegate','D'=>'Action'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['async'],'order'=>10,'text'=>'Which method waits synchronously for a Task?','choices'=>['A'=>'Task.Wait','B'=>'await','C'=>'Task.Async','D'=>'Task.Join'],'correct'=>'A','points'=>1],

            // ================================
            // 17) File I/O
            // ================================
            ['quiz_id'=>$quizIds['fileio'],'order'=>1,'text'=>'Which namespace handles file I/O?','choices'=>['A'=>'System.IO','B'=>'System.Linq','C'=>'System.Text','D'=>'System.Data'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>2,'text'=>'Which class reads text files line by line?','choices'=>['A'=>'StreamReader','B'=>'StreamWriter','C'=>'FileInfo','D'=>'FileStream'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>3,'text'=>'Which class writes text to a file?','choices'=>['A'=>'StreamWriter','B'=>'StreamReader','C'=>'TextReader','D'=>'Console'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>4,'text'=>'Which method reads all lines at once?','choices'=>['A'=>'File.ReadAllLines','B'=>'FileStream.Read','C'=>'TextReader.Read','D'=>'FileInfo.Open'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>5,'text'=>'Which method checks if a file exists?','choices'=>['A'=>'File.Exists','B'=>'File.Check','C'=>'File.Validate','D'=>'File.Has'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>6,'text'=>'Which stream supports binary data?','choices'=>['A'=>'FileStream','B'=>'StreamWriter','C'=>'StreamReader','D'=>'TextWriter'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>7,'text'=>'What does using statement do in file I/O?','choices'=>['A'=>'Ensures disposal of resources','B'=>'Imports IO namespace','C'=>'Locks the file','D'=>'Creates threads'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>8,'text'=>'Which class gets file metadata?','choices'=>['A'=>'FileInfo','B'=>'StreamReader','C'=>'Path','D'=>'Directory'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>9,'text'=>'Which class helps with file path operations?','choices'=>['A'=>'Path','B'=>'FileInfo','C'=>'Stream','D'=>'FileSystem'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['fileio'],'order'=>10,'text'=>'Which method writes all text at once?','choices'=>['A'=>'File.WriteAllText','B'=>'FileStream.Write','C'=>'FileInfo.Save','D'=>'TextWriter.Write'],'correct'=>'A','points'=>1],

            // ================================
            // 18) Attributes & Reflection
            // ================================
            ['quiz_id'=>$quizIds['attributes'],'order'=>1,'text'=>'What is an attribute in C#?','choices'=>['A'=>'Metadata for code elements','B'=>'Database column','C'=>'Property value','D'=>'Exception'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>2,'text'=>'Which class do all attributes inherit from?','choices'=>['A'=>'System.Attribute','B'=>'System.Object','C'=>'System.Reflect','D'=>'System.Meta'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>3,'text'=>'Which attribute marks obsolete methods?','choices'=>['A'=>'Obsolete','B'=>'Deprecated','C'=>'Old','D'=>'Removed'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>4,'text'=>'Which namespace supports reflection?','choices'=>['A'=>'System.Reflection','B'=>'System.Runtime','C'=>'System.IO','D'=>'System.Meta'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>5,'text'=>'Which class gets metadata at runtime?','choices'=>['A'=>'Type','B'=>'Object','C'=>'Property','D'=>'Attribute'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>6,'text'=>'Which method gets all methods of a type?','choices'=>['A'=>'GetMethods','B'=>'GetAll','C'=>'GetInfo','D'=>'FetchMethods'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>7,'text'=>'Which method gets custom attributes?','choices'=>['A'=>'GetCustomAttributes','B'=>'GetAttributes','C'=>'GetMeta','D'=>'GetTags'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>8,'text'=>'Reflection can be used to…','choices'=>['A'=>'Inspect assemblies at runtime','B'=>'Encrypt data','C'=>'Run faster','D'=>'Create threads'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>9,'text'=>'Which attribute prevents serialization of a field?','choices'=>['A'=>'NonSerialized','B'=>'Skip','C'=>'Ignore','D'=>'Hidden'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['attributes'],'order'=>10,'text'=>'Which attribute is used for unit testing?','choices'=>['A'=>'TestMethod','B'=>'Run','C'=>'Check','D'=>'Verify'],'correct'=>'A','points'=>1],

            // ================================
            // 19) Dependency Injection
            // ================================
            ['quiz_id'=>$quizIds['di'],'order'=>1,'text'=>'What is Dependency Injection (DI)?','choices'=>['A'=>'Providing dependencies from outside','B'=>'Hardcoding objects','C'=>'Inheritance','D'=>'Encapsulation'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>2,'text'=>'Which design principle does DI support?','choices'=>['A'=>'Inversion of Control (IoC)','B'=>'Encapsulation','C'=>'Recursion','D'=>'Abstraction'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>3,'text'=>'Which DI type passes dependencies via constructor?','choices'=>['A'=>'Constructor injection','B'=>'Setter injection','C'=>'Method injection','D'=>'Global injection'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>4,'text'=>'Which namespace provides built-in DI in .NET Core?','choices'=>['A'=>'Microsoft.Extensions.DependencyInjection','B'=>'System.DI','C'=>'System.Reflection','D'=>'Microsoft.IOC'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>5,'text'=>'What is a service lifetime that creates new instance each time?','choices'=>['A'=>'Transient','B'=>'Scoped','C'=>'Singleton','D'=>'Static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>6,'text'=>'What is a service lifetime that creates only one instance per app?','choices'=>['A'=>'Singleton','B'=>'Transient','C'=>'Scoped','D'=>'Static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>7,'text'=>'Which DI lifetime is per web request?','choices'=>['A'=>'Scoped','B'=>'Singleton','C'=>'Transient','D'=>'Static'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>8,'text'=>'Which collection holds service registrations?','choices'=>['A'=>'IServiceCollection','B'=>'IServiceProvider','C'=>'IConfiguration','D'=>'IContainer'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>9,'text'=>'Which method resolves registered services?','choices'=>['A'=>'GetService','B'=>'Resolve','C'=>'Fetch','D'=>'Locate'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['di'],'order'=>10,'text'=>'What benefit does DI provide?','choices'=>['A'=>'Loose coupling','B'=>'Faster CPU','C'=>'Automatic threading','D'=>'Recursion'],'correct'=>'A','points'=>1],

            // ================================
            // 20) Unit Testing
            // ================================
            ['quiz_id'=>$quizIds['testing'],'order'=>1,'text'=>'Which framework is commonly used for unit testing in .NET?','choices'=>['A'=>'xUnit','B'=>'JUnit','C'=>'Mocha','D'=>'Jest'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>2,'text'=>'Which attribute marks a test method in NUnit?','choices'=>['A'=>'[Test]','B'=>'[Run]','C'=>'[Check]','D'=>'[Execute]'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>3,'text'=>'Which attribute marks a test method in xUnit?','choices'=>['A'=>'[Fact]','B'=>'[Test]','C'=>'[Run]','D'=>'[Check]'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>4,'text'=>'Which method asserts equality in tests?','choices'=>['A'=>'Assert.Equal','B'=>'Assert.Same','C'=>'Assert.Check','D'=>'Assert.Verify'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>5,'text'=>'Which method asserts a condition is true?','choices'=>['A'=>'Assert.True','B'=>'Assert.Valid','C'=>'Assert.Equals','D'=>'Assert.Check'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>6,'text'=>'Which attribute runs code before each test?','choices'=>['A'=>'[SetUp] or constructor','B'=>'[Before]','C'=>'[Init]','D'=>'[PreTest]'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>7,'text'=>'Which attribute runs code after each test?','choices'=>['A'=>'[TearDown] or Dispose','B'=>'[After]','C'=>'[Cleanup]','D'=>'[PostTest]'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>8,'text'=>'Which principle should unit tests follow?','choices'=>['A'=>'Arrange-Act-Assert','B'=>'Loop-Run-Check','C'=>'Try-Catch-Throw','D'=>'Write-Run-Skip'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>9,'text'=>'What is mocking used for in tests?','choices'=>['A'=>'Simulate dependencies','B'=>'Slow down code','C'=>'Encrypt data','D'=>'Compile faster'],'correct'=>'A','points'=>1],
            ['quiz_id'=>$quizIds['testing'],'order'=>10,'text'=>'Which is NOT a characteristic of good unit tests?','choices'=>['A'=>'Slow and fragile','B'=>'Repeatable','C'=>'Isolated','D'=>'Fast'],'correct'=>'A','points'=>1],


        ];

        $payload = array_map(function ($r) use ($now) {
            $r['choices'] = json_encode($r['choices']);
            $r['created_at'] = $now;
            $r['updated_at'] = $now;
            return $r;
        }, $rows);

        DB::table('questions')->insert($payload);
    }
}
