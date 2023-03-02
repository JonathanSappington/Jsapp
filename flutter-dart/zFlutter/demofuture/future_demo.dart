import 'dart:async';

Duration myTime = Duration(seconds: 4);

Future<void> waitOnInfo()async
{
  var myData = await waitOnSomething();
  print(myData);

  var myData2 = await waitOnSomething2();
  print(myData2);
}

Future<String> waitOnSomething() => Future.delayed(myTime,() => "Item 1");
Future<String> waitOnSomething2() async => Future.delayed(myTime,() => "Item 1 a");

void function2()
{
  print("Item 2");
}

void function3()
{
  print("Item 3");
}

main()
{
  waitOnInfo();
  function2();
  function3();
}