import 'package:flutter/material.dart';

void main()
{
  runApp(new MaterialApp(
    home: new MyStatelessWidget()
  ));
}

class MyStatelessWidget extends StatelessWidget
{
  @override
  Widget build(BuildContext context)
  {
    return new Scaffold(
      appBar: new AppBar(title: Text("Hello World"),
      foregroundColor: Colors.deepOrange,
      backgroundColor: Colors.red,),
      backgroundColor: Colors.green,
      body: new Container(
        padding: new EdgeInsets.all(20),
        child: new Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: <Widget>[
            Text("Hey"),
            Text("My Name"),
            Text("Is Frank"),
            MyCard(
              title: Text("Hello",style: TextStyle(fontSize: 20)),
              icon: Icon(Icons.favorite,size:40,color:Colors.red),
            )
          ],
        ),
      ),
    );
  }
}

class MyCard extends StatelessWidget
{
  final Widget title;
  final Widget icon;

  MyCard({this.title = const Text(""),this.icon = const Icon(Icons.favorite)});

  @override
  Widget build(BuildContext context)
  {
    return new Container(
    padding: EdgeInsets.only(bottom: 20),
    child: Column(
      children: <Widget>[
        this.title,
        this.icon
        ],
      ),
    );
  }
}