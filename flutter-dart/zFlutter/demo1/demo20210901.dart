// dart file end with extensions .dart

// stdin stdout
// to use stdin stdout dart:io

void variableReview() {
  /*
		variable
		note: if initial values are not declared
		then the initial value is null
		
		ALL VARIABLES ARE OBJECTS
	*/
  print('Variable Review');
  // numbers
  double salary = 0.0;
  int anum = 42;

  print('double = ' + salary.toString() + "\n");
  print('int = ' + anum.toString() + "\n");

  // String and Boolean
  String someWord = 'This is a string';
  String someWord2 = 'Yada Yada';
  bool isBreathing = true;

  // $ in front of variable name acts as placeholder
  print('String example 1: ' + someWord);
  print('String example 1: $someWord');

  // lists
  var nums = [1, 2, 3, 4, 5];
  var names = ['Larry', 'curly', 'moe', 'shemp'];

  String theString = " ";

  for (int c = 0; c < nums.length; c++) {
    theString = theString + nums[c].toString() + " ";
  }

  print(theString);

  print('--The Indexes--');

  theString = " ";

  nums.forEach((listItem) {
    theString += listItem.toString() + " ";
  });

  print(theString);

  print('--The Stooges via lambda--');

  names.forEach((stooge) => print(stooge));

  print('-- List using in --');

  for(var value in names)
    print(value);

  print('-- Collection --');

  // Collection - a set of unique items
  var us_states = {'MT','OR','WI','CO'};
  us_states.forEach((theState) => print(theState));

  // maps key - value
  var vehicles = {
    'car':'mustang',
    'airplane':'cessna',
    'scooter':'lime',
    'boat':'wellcraft'
  };

  print("\n -- keys --\n");
  for(var valueKey in vehicles.keys)
  {
    print(valueKey);
  }

  print("\n -- values --\n");
  for(var keyValue in vehicles.values)
  {
    print(keyValue);
  }

  // dynamic datatype - datatype changes
  dynamic xx = 'Some Text';
  xx = 42.0;
  xx = true;
  xx = '\u{1F603}';
  print(xx);
}

main() {
  variableReview();
}
