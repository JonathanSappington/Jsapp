// Written by Jonathan J Sappington
// Date 12/8/21
// Assignment: Final Assignment

import 'package:flutter/material.dart';
import 'dart:async';
import 'dart:convert';
import 'package:flutter/services.dart';

import 'package:flutter/foundation.dart';
import 'package:url_launcher/url_launcher.dart';

String jsonFile = "";

void main() {
  runApp(MaterialApp(
      home: const MyApp(),
      debugShowCheckedModeBanner: false,
      routes: <String, WidgetBuilder>{
        "/HomePage": (BuildContext context) => const MyApp(),
        "/ScorePage": (BuildContext context) => const Scoreboard(),
        "/NewPage": (BuildContext context) => const New(),
        "/AboutPage": (BuildContext context) => const About(),
      }
  ));
}

class MyApp extends StatefulWidget{
  const MyApp({Key? key}): super(key: key);

  @override
 _MyApp createState() => _MyApp();
}

class _MyApp extends State<MyApp>{
  // Opens new page
  // --------------------------------------
  void createNew(){
    setState(() {
      Navigator.of(context).pushNamed("/NewPage");
    });
  }
  // --------------------------------------

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Homepage"), backgroundColor: Colors.orangeAccent,),

      body: Container(
        padding: const EdgeInsets.all(20),
        width: MediaQuery.of(context).size.width,

        // Main Page greeting and new button
        // --------------------------------------
        child: Column(
          children: [
            Container(child: Image.asset("assets/Notepad.jpg",),width: 250,height: 250,),

            RichText(text: const TextSpan(text: "Scoreboard App",
                style: TextStyle(fontSize: 20,color:  Colors.blue))),

            const Text("keep track of all your games!",textAlign: TextAlign.center, style: TextStyle(fontSize: 18),),

            ElevatedButton(onPressed: createNew, child: const Text("New +"),)
          ],
        ),
        // --------------------------------------
      ),

      drawer: drawerList(context),
    );
  }
}

class Scoreboard extends StatefulWidget{
  const Scoreboard({Key? key}): super(key: key);

  @override
  _Scoreboard createState() => _Scoreboard();
}

class _Scoreboard extends State<Scoreboard>{
  int _column = 1;
  int _row = 1;

  List controllers = [];

  Widget createScores(){
    // If json is not empty then take given data from new page and recreate it in the app
    // Else create new score board
    // --------------------------------------
    if(jsonFile != "") {
      List board = json.decode(jsonFile);
      for (int x = 0; x < board.length; x++) {
        controllers.add({});

        // Create name and get name data from json file
        // --------------------------------------
        controllers[x]["Name"] = TextEditingController();
        controllers[x]["Name"].text = board[x]["Name"];
        // --------------------------------------

        // Create Score y and get score y data from json file
        // --------------------------------------
        for (int y = 1; y < board[x].length - 1; y++) {
          controllers[x]["Score $y"] = TextEditingController();
          controllers[x]["Score $y"].text = board[x]["Score $y"];
        }
        // --------------------------------------

        // Create Total and get total data from json file
        // --------------------------------------
        controllers[x]["Total"] = TextEditingController();
        controllers[x]["Total"].text = board[x]["Total"];
        // --------------------------------------
      }

      // Finds column and row size from json data and applies it to the following
      // variables
      // --------------------------------------
      _column = controllers[0].length - 1;
      _row = controllers.length;
      // --------------------------------------

      // Removes json data to stop the program from constantly loading this data set
      jsonFile = "";
    }
    // --------------------------------------

    List<Widget> scores = <Widget>[];

    setState(() {
      List<Widget> text = <Widget>[];

      int newTotal = 0;

      if(controllers.isNotEmpty) {
        // Removes one row if controllers has more rows than the row variable
        // --------------------------------------
        if (controllers.length > _row) {
          controllers.removeAt(controllers.length - 1);
        }
        // --------------------------------------

        // Removes one column if controllers has more columns than the column variable
        // --------------------------------------
        for (int x = 0; x < controllers.length; x++) {
          if (controllers[x].length > _column + 1) {
            int end = _column;
            controllers[x].remove("Score $end");
          }
        }
        // --------------------------------------
      }

      for(int i = 0; i < _row; i++) {
        // If data Name doesn't already exist create new name
        // --------------------------------------
        if(controllers.length < i + 1) {
          controllers.add({});
          controllers[i]["Name"] = TextEditingController();
          controllers[i]["Name"].text = "Jeff";
        }
        // --------------------------------------

        // If data Score x doesn't already exist create new score x
        // --------------------------------------
        for (int x = 1; x < _column; x++) {
          if(controllers[i].length - 2 < x) {
            controllers[i]["Score $x"] = TextEditingController();
            controllers[i]["Score $x"].text = "0";
          }

          // Add total scores together
          newTotal += int.parse(controllers[i]["Score $x"].text);
        }
        // --------------------------------------

        // If data Total doesn't already exist create new total
        // --------------------------------------
        if(controllers.length < i + 2) {
          controllers[i]["Total"] = TextEditingController();
        }
        controllers[i]["Total"].text = newTotal.toString();
        newTotal = 0;
        // --------------------------------------
      }

      // Creates text fields for each critera Name, Score, Total.
      // --------------------------------------
      for(int i = 0; i < _row; i++) {
        text.add(TextField(controller: controllers[i]["Name"],textAlign: TextAlign.center,));

        for(int x = 1; x < _column; x++) {
          text.add(TextField(controller: controllers[i]["Score $x"],textAlign:
          TextAlign.center,onSubmitted: (value) => createScores()));
        }

        text.add(Text(controllers[i]["Total"].text,textAlign: TextAlign.center));

        // Add all critera to scores Container
        // --------------------------------------
        scores.add(
          Container(
            width: 100,
            child: Column(children: text)
            )
        );
        // --------------------------------------

        text = [];
      }
      // --------------------------------------

    });

    // Returns list scores as widget
    return Row(mainAxisAlignment: MainAxisAlignment.center, children: scores);
  }

  Future<void> save() async{
    // Empty variable to hold saved data
    List board = [];

    // Gets all text data from scores and adds them to board
    // --------------------------------------
    for (int x = 0; x < controllers.length; x++) {
      board.add({});

      board[x]["Name"] = controllers[x]["Name"].text;
      for (int y = 1; y < controllers[x].length - 1; y++) {
        board[x]["Score $y"] = controllers[x]["Score $y"].text;
      }
      board[x]["Total"] = controllers[x]["Total"].text;
    }
    // --------------------------------------

    // Encodes board data into json
    final data = json.encode(board);

    setState(() {
      // Copys json data to clipboard
      Clipboard.setData(ClipboardData(text: data));
    });
  }

  void tap(int value){
    setState(() {
      // Checks what button was clicked and applies the appropriate function
      // --------------------------------------
      switch(value)
      {
        case 0:
          _column = _column < 26 ? _column + 1: _column;
          break;
        case 1:
          _column = _column - 1 > 0 ? _column - 1: _column;
          break;
        case 2:
          save();
          break;
        case 3:
          _row = _row < 4 ? _row + 1: _row;
          break;
        case 4:
          _row = _row - 1 > 0 ? _row - 1: _row;
          break;
      }
      // --------------------------------------
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Scoreboard"), backgroundColor: Colors.orangeAccent,),
      body: ListView(
        children: [
          Column(children: [createScores()]),
        ],
      ),

      // Menu bar for score board
      // --------------------------------------
      bottomNavigationBar: BottomNavigationBar(items: const <BottomNavigationBarItem>[
        BottomNavigationBarItem(icon: Icon(Icons.add),label: "Column"),
        BottomNavigationBarItem(icon: Icon(Icons.remove),label: "Column"),
        BottomNavigationBarItem(icon: Icon(Icons.file_copy_outlined),label: "Copy"),
        BottomNavigationBarItem(icon: Icon(Icons.add),label: "Row"),
        BottomNavigationBarItem(icon: Icon(Icons.remove),label: "Row")
      ],currentIndex: 0, onTap: tap,selectedItemColor: Colors.black,
        unselectedItemColor: Colors.black,selectedFontSize: 12,type: BottomNavigationBarType.fixed,),
      // --------------------------------------

      drawer: drawerList(context),
    );
  }
}

class New extends StatefulWidget{
  const New({Key? key}): super(key: key);

  @override
  _New createState() => _New();
}

class _New extends State<New>{
  var myFocusNode = FocusNode();

  TextEditingController myController = TextEditingController();
  String myName = "";

  @override
  void initState() {
    super.initState();

    myController = TextEditingController();
    myController.text = "";
  }

  // Sends the user to the score page and gets given json data from textfield
  // --------------------------------------
  void bttnPressed() {
    setState(() {
      jsonFile = myController.text;
      Navigator.of(context).pushNamed("/ScorePage");
    });
    myController.text="";
    FocusScope.of(context).requestFocus(myFocusNode);
  }
  // --------------------------------------

  // Creates json data text field
  // --------------------------------------
  Widget createTextField(){
    return Expanded(
        child: TextField(
          controller: myController,
          focusNode: myFocusNode,

          decoration: const InputDecoration(
              border: OutlineInputBorder(
                  borderSide: BorderSide(color:Colors.indigo,
                      width: 2.0,
                      style: BorderStyle.solid))),

          textInputAction: TextInputAction.newline,

          onSubmitted: (value){
            bttnPressed();
            myController.text="";
            FocusScope.of(context).requestFocus(myFocusNode);
          },
        )
    );
  }
  // --------------------------------------

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Create New"), backgroundColor: Colors.orangeAccent,),

      body: ListView(
        padding: const EdgeInsets.all(20),

        children: [
          Row(children: [
            const Text("Enter Data: "),
            createTextField()
          ]),

          ElevatedButton(onPressed: bttnPressed, child: const Text("Enter"))],
      ),

      drawer: drawerList(context),
    );
  }
}

class About extends StatefulWidget{
  const About({Key? key}): super(key: key);

  @override
  _About createState() => _About();
}

class _About extends State<About>{
  // Launches patreon page on button clicked
  void _launchURL() async {
    if (!await launch("https:www.patreon.com")) throw 'Could not launch https:www.patreon.com';
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("About"), backgroundColor: Colors.orangeAccent,),

      body: Container(
        margin: const EdgeInsets.all(50),

        child: Column(
          children: [

            RichText(text: const TextSpan(text: "About This App",style:
            TextStyle(fontSize: 20,fontWeight: FontWeight.bold,color:  Colors.blue)),textAlign: TextAlign.center,),

            RichText(text: const TextSpan(text: "Have you ever had the "
                "experience of playing a board game and having to tediously "
                "input all player scores? "
                "Well, the purpose of this app is to accurately keep a tally of "
                "all the board games you play with your friends and families."
            "\n",style: TextStyle(fontSize: 18,color:  Colors.black)),textAlign: TextAlign.center,),

            RichText(text: const TextSpan(text: "If you're feeling generous and "
                "wish to aid me in my journey of improving scoreboards just click on the "
                "link to the patreon "
                "and support me there"
                "\n",style: TextStyle(fontSize: 18,color:  Colors.black)),textAlign: TextAlign.center,),

            InkWell(onTap: _launchURL, child: Image.asset("assets/patreon.jpg"),)
          ],
        ),
      ),
      drawer: drawerList(context),
    );
  }
}

Widget drawerList(BuildContext context) {
  // Creates drawer able to be called from anywhere in the code
  // --------------------------------------
  return Drawer(
    child: ListView(
      padding: EdgeInsets.zero,
      children: [

        const DrawerHeader(child: Text("", style: TextStyle(fontSize: 23, color: Colors.black)),
          decoration: BoxDecoration(
              image: DecorationImage(image: AssetImage("assets/campus.jpg"),fit: BoxFit.cover)
          ),
        ),

        ListTile(
          title: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: const [Text("Home"),Icon(Icons.home)]),
          onTap: (){Navigator.of(context).pushNamed("/HomePage");},
        ),
        ListTile(
          title: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: const [Text("New"),Icon(Icons.add)]),
          onTap: (){Navigator.of(context).pushNamed("/NewPage");},
        ),
        ListTile(
          title: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: const [Text("About"),Icon(Icons.account_circle)]),
          onTap: (){Navigator.of(context).pushNamed("/AboutPage");},
        )
      ],
    ),
  );
  // --------------------------------------
}