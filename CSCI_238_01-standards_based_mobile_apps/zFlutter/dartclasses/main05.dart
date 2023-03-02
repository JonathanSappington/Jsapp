class thebase
{
  int a;
  int b;

  // constructor
  thebase(this.a,this.b);

  set seta(int value) => a = value;
  set setb(int value) => b = value;

  get geta => a;
  get getb => b;

  int add_ab()
  {
    return(a + b);
  }
}

class thechild extends thebase
{
  int c;
  int d;

  // constructor
  // note the field names from the parent class a and b
  thechild(this.c,this.d, int a, int b): super(a,b);

  set setc(int value) => c = value;
  set setd(int value) => d = value;

  get getc => c;
  get getd => d;

  int add_abcd()
  {
    return(a + b + c + d);
  }
}

// -----------------------------------------------

class Person
{
  String fname = "";
  String lname = "";
  String city = "";

  // empty constructor
  Person();

  // named constructor
  // variables must match
  Person.setallinfo(this.fname,this.lname,this.city);
  Person.setfirstlast(this.fname,this.lname);

  /*
    Person.setfirstlast(this.fname,this.lname)
    {
      // the constructor can be written like this
      // if there needs to be additional code for setup
    }
   */

  Person.setfirstlastKalispell(this.city)
  {
    city = "kalispell";
  }

  set setfirstname(String value) => fname = value;
  set setlastname(String value) => lname = value;
  set setcity(String value) => city = value;

  get getfirstname => fname;
  get getlastname => lname;
  get getcity => city;

  String allInfo()
  {
    return fname + " " + lname + ", " + city;
  }
}

class Worker extends Person
{
  String company = "";
  String title = "";
  double salary = 0.0;

  // _ means hidden
  String _memo = "";

  Worker()
  {
    _memo = "Great Work";
  }

  Worker.setWorkerInfo(this.company, this.title,this.salary,
      String fn, String ln): super.setfirstlast(fn,ln);

  Worker.setAllInfo(this.company, this.title,this.salary,
      String fn, String ln, String city): super.setallinfo(fn,ln,city);

  set setcompany(String value) => company = value;
  get getcompany => company;

  set settitle(String value) => title = value;
  get gettitle => title;

  set setsalary(double value) => salary = value;
  get getsalary => salary;

  set setmemo(String value) => _memo = value;
  get getmemo => _memo;

  String allInfo()
  {
    return (fname + " " + lname + ", " + city + " - " +
        company + " " + title + " " + salary.toString() + " " + _memo);
  }
}

main()
{
  // variables
  // empty list - note it is a var variable
  var people = <Person>{};
  var workers = <Worker>{};

  int numPeople = 10;

  thebase base = new thebase(40, 60);
  thechild child = new thechild(10, 20, 30, 40);

  print(base.add_ab());

  base.seta = 100;
  print(base.add_ab());
  print(child.add_abcd());

  Person p1 = new Person.setallinfo("George","Smith","Polson");
  print(p1.allInfo());

  for(int i = 0; i < numPeople; i++)
  {
    Person p2 = new Person.setallinfo(
        "Bob" + i.toString(),
        "Doe" + i.toString(),
        "Dayton" + i.toString());
    people.add(p2);
  }

  for(int i = 0; i < numPeople; i++)
  {
    Worker w1 = new Worker.setAllInfo("mycorp","software engineer", i.toDouble(),"Frank","Bob","Kalispell");
    workers.add(w1);
  }

  people.forEach((item) { print(item.allInfo());});
  workers.forEach((item) { print(item.allInfo());});

}