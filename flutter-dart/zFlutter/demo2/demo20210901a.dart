import 'dart:io';

void printNums(var alist)
{
  for(var item in alist)
    {
      stdout.write(item.toString() + ' ');
    }

  print("");
}

num Sum3(num xx, num yy, num zz)
{
  num ans = 0;
  ans = xx + yy + zz;

  return ans;
}

num SumLambda(num xx, num yy, num zz) => xx + yy + zz;

main()
{
  // List
  var someNums = [11,22,33,44,55,66];

  print("\nPrint Some Numbers");
  printNums(someNums);
  someNums.forEach((var items) => {stdout.write(items.toString() + " ")});

  print("\nSum Some Numbers");
  stdout.write(Sum3(someNums[0], someNums[1], someNums[2]));
  print("\n" + SumLambda(someNums[0], someNums[1], someNums[2]).toString());
}