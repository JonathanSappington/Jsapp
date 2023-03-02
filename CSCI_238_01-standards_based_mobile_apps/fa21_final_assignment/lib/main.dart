import 'package:flutter/material.dart';
import 'dart:async';
import 'dart:io';
import 'dart:convert';

import 'package:flutter/foundation.dart';

void main() {
  runApp(MaterialApp(
      home: MyApp(),
      routes: <String, WidgetBuilder>{
        "/HomePage": (BuildContext context) => MyApp(),
        "/ScorePage": (BuildContext context) => Scoreboard(),
        "/NewPage": (BuildContext context) => New(),
        "/LoadPage": (BuildContext context) => Load(),
        "/AboutPage": (BuildContext context) => About(),
      }
  ));
}

class MyApp extends StatefulWidget{
  const MyApp({Key? key}): super(key: key);

 _MyApp createState() => _MyApp();
}

class _MyApp extends State<MyApp>{
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Homepage"),),

      drawer: drawerList(context),
    );
  }
}

class Scoreboard extends StatefulWidget{
  const Scoreboard({Key? key}): super(key: key);

  _Scoreboard createState() => _Scoreboard();
}

class _Scoreboard extends State<Scoreboard>{
  int _column = 1;
  int _row = 1;
  int total = 0;

  List Board(){
    List<Widget> boardList = <Widget>[];
    List<Widget> boardRow = <Widget>[];
    List<int> scores = <int>[];

    _column = _column > 13 ? 13: _column;
    _column = _column <= 0 ? 1: _column;

    _row = _row > 5 ? 5: _row;
    _row = _row <= 0 ? 1: _row;

    List board = [];

    for(int y = 0; y < _row; y++) {
      board.add({"Name":"jeff"});

      for (int x = 0; x < _column; x++) {
        boardList.add(
            Container(
              width: 100,
              child: Column(
                  children: [
                    TextField(decoration: const InputDecoration(
                      contentPadding: const EdgeInsets.symmetric(
                          horizontal: 20.0,vertical: 48),
                    ))
                  ]
              ),
            )
        );
        if(y == 0)scores.add(y);
        board[y].addAll({"Score $x":"0"});
      }
      board[y].addAll({"Total": "0"});
      boardRow.add(Column(children: boardList.sublist(boardList.length - _column,boardList.length),));
    }

    return board;
  }

  List<Widget> jsonReader(){
    List<Widget> Boards = <Widget>[];
    List<TextEditingController> myController2 = [];
    List<Widget> tf = [];

    for(int i = 0; i < Board().length; i++) {
      TextEditingController myController1 = TextEditingController();
      myController1.text = Board()[i]["Name"];

      myController2.clear();
      tf.clear();

      for(int j = 0; j < Board()[0].length - 2; j++) {
        myController2.add(TextEditingController());
        myController2[j].text = Board()[i]["Score $j"];
        tf.add(TextField(controller: myController2[j],textAlign: TextAlign.center,));
      }

        Boards.add(Container(
          width: 100,
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              TextField(controller: myController1,textAlign: TextAlign.center),
              Column(children: tf,),
              Text(Board()[i]["Total"],textAlign: TextAlign.center)
            ],
          ),
        )
        );
    }

    return Boards;
  }

  int _selectedIndex = 0;

  Future<void> save() async {
    final file = await File('assets/template.json');
    final data = await json.encode(Board());
    print(data);
    file.writeAsString(data);
  }

  void tap(int value){
    setState(() {
      switch(value) {
        case 0:
          _column += 1;
          break;
        case 1:
          _column -= 1;
          break;
        case 2:
          save();
          break;
        case 3:
          _row += 1;
          break;
        case 4:
          _row -= 1;
          break;
      }

      _selectedIndex = value;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Scoreboard"),),
      body: ListView(
        children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: jsonReader()
          )
        ],
      ),
        bottomNavigationBar: BottomNavigationBar(items: <BottomNavigationBarItem>[
          BottomNavigationBarItem(icon: Icon(Icons.add),label: "Add Column"),

          BottomNavigationBarItem(icon: Icon(Icons.remove),label: "Remove Column"),
          BottomNavigationBarItem(icon: Icon(Icons.save),label: "Save"),
          BottomNavigationBarItem(icon: Icon(Icons.add),label: "Add Row"),
          BottomNavigationBarItem(icon: Icon(Icons.remove),label: "Remove Row")
        ],currentIndex: _selectedIndex, onTap: tap,selectedItemColor: Colors.black,unselectedItemColor: Colors.black, type: BottomNavigationBarType.fixed,),

      drawer: drawerList(context),
    );
  }
}

class New extends StatefulWidget{
  const New({Key? key}): super(key: key);

  _New createState() => _New();
}

class _New extends State<New>{
  List _items = [];

  //Future<void> readJson() async{
    //final String response = await rootBundle.loadString("assets/movies_array.json");
    //final data = await json.decode(response);

    //setState(() {
      //_items = data;
    //});
  //}
  var myFocusNode = FocusNode();
  TextEditingController myController = TextEditingController();
  String myName = "";

  @override
  void initState() {
    super.initState();

    myController = TextEditingController();
    myController.text = "";
  }

  void bttnPressed() {
    setState(() {
      myName = myController.text;
      //File("assets/context.txt").createSync(recursive: true);
      Navigator.of(context).pushNamed("/ScorePage");
    });
    myController.text="";
    FocusScope.of(context).requestFocus(myFocusNode);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Create New"),),
      body: ListView(
        padding: EdgeInsets.all(20),
        children: [
          Row(children: [
            const Text("Enter Name: "),
            Expanded(
                child: TextField(
                  controller: myController,
                  focusNode: myFocusNode,
                  decoration: InputDecoration(
                      border: const OutlineInputBorder(
                          borderSide: BorderSide(color:Colors.indigo,
                              width: 2.0,
                              style: BorderStyle.solid))) ,
                  textInputAction: TextInputAction.newline,
                  onSubmitted: (value){
                    bttnPressed();
                    myController.text="";
                    FocusScope.of(context).requestFocus(myFocusNode);
                  },
                )
            )
          ]
          ),

          ElevatedButton(onPressed: bttnPressed,
              child: const Text("Enter"))
        ],
      ),
      drawer: drawerList(context),
    );
  }
}

class Load extends StatefulWidget{
  const Load({Key? key}): super(key: key);

  _Load createState() => _Load();
}

class _Load extends State<Load>{
  void bttnPressed() {
    setState(() {
      Navigator.of(context).pushNamed("/ScorePage");
    });
  }

  Widget FindFiles(){
    return Card(
      child: InkWell(
        borderRadius: BorderRadius.circular(40),
        splashColor: Colors.blue.withAlpha(30),
        onTap: () {
          bttnPressed();
        },
        child: SizedBox(
          width: MediaQuery.of(context).size.width / 2 - 10,
          child: Column(children: [Icon(Icons.file_copy_outlined,color: Colors.blue,size: 100,), Text("Template.json",style: TextStyle(fontSize: 24,color: Colors.blue),)]),
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Load"),),

      body: ListView(
        children: [
          Row(
            children: [
              FindFiles(),
              FindFiles(),
            ],
          ),

          Row(
            children: [
              FindFiles(),
              FindFiles(),
            ],
          ),

          Row(
            children: [
              FindFiles(),
              FindFiles(),
            ],
          ),

          Row(
            children: [
              FindFiles(),
              FindFiles(),
            ],
          ),

          Row(
            children: [
              FindFiles(),
              FindFiles(),
            ],
          ),

          Row(
            children: [
              FindFiles(),
              FindFiles(),
            ],
          ),
        ],
      ),

      drawer: drawerList(context),
    );
  }
}

class About extends StatefulWidget{
  const About({Key? key}): super(key: key);

  _About createState() => _About();
}

class _About extends State<About>{
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("About"),),

      drawer: drawerList(context),
    );
  }
}

Widget drawerList(BuildContext context) {
  return Drawer(

    child: ListView(
      padding: EdgeInsets.zero,
      children: [
        Column(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
        DrawerHeader(child:  Text("Navigation", style: TextStyle(fontSize: 23, color: Colors.black)),
          decoration: BoxDecoration(
              image: const DecorationImage(image: AssetImage("assets/campus.jpg"),fit: BoxFit.cover)
          ),
        ),

        ListTile(
          title: Container( child: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: [const Text("Home"), const Icon(Icons.home)])),
          onTap: (){Navigator.of(context).pushNamed("/HomePage");},
        ),
        ListTile(
          title: Container( child: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: [const Text("New"), const Icon(Icons.add)])),
          onTap: (){Navigator.of(context).pushNamed("/NewPage");},
        ),
        ListTile(
          title: Container( child: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: [const Text("Load"), const Icon(Icons.folder)])),
          onTap: (){Navigator.of(context).pushNamed("/LoadPage");},
        ),
        ListTile(
          title: Container(child: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: [const Text("About"), const Icon(Icons.account_circle)])),
          onTap: (){Navigator.of(context).pushNamed("/AboutPage");},
        )
  ]
        )
      ],
    ),
  );
}