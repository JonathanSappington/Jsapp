// Assignment Pages Assignment
// Written by Jonathan J Sappington
// Date 10/07/21

// Pubspec refers to assets instead of images

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


void main() {
  runApp(MaterialApp(
      home: const HomePage(),
      debugShowCheckedModeBanner: false,

      routes: <String,WidgetBuilder>{
        "/HomePage":(BuildContext context) => const HomePage(),
        "/ProgrammingPage":(BuildContext context) => const ProgrammingPage(),
        "/WebPage":(BuildContext context) => const WebPage(),
        "/python":(BuildContext context) => const PythonExample(),
        "/csharp":(BuildContext context) => const CSharpExample(),
        "/html5":(BuildContext context) => const HTMLExample(),
        "/css":(BuildContext context) => const CSSExample(),
      }
  ));
}

class HomePage extends StatefulWidget
{
  const HomePage({Key? key}): super(key:key);

  _HomePage createState() => _HomePage();
}

class _HomePage extends State<HomePage>
{
  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
      appBar: AppBar(title: Text("HomePage"), backgroundColor: Colors.deepPurple,),

      body: Container(
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text("HomePage",style: TextStyle(fontSize: 30),),
              Text("An app that provides examples of my programming experience.",
                style: TextStyle(fontSize: 14), textAlign: TextAlign.center,),

              Divider(thickness: 2, color: Colors.deepPurpleAccent,),

              IconButton(
                icon: Icon(Icons.description_outlined, color: Colors.redAccent),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/ProgrammingPage");},
              ),
              const Text("General Programming", textAlign: TextAlign.center),

              Padding(padding: EdgeInsets.symmetric(vertical: 20),),

              IconButton(
                icon: Icon(Icons.web, color: Colors.redAccent),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/WebPage");},
              ),
              const Text("Web Programming", textAlign: TextAlign.center),
            ],
          ),
        ),
      ),
    );
  }
}

class ProgrammingPage extends StatefulWidget
{
  const ProgrammingPage({Key? key}): super(key:key);

  _ProgrammingPage createState() => _ProgrammingPage();
}

class _ProgrammingPage extends State<ProgrammingPage>
{
  Widget homeBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.home, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/HomePage");},
              ),
              const Text("HomePage", textAlign: TextAlign.center),
            ]
        )
    );
  }

  Widget webBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.web, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/WebPage");},
              ),
              const Text("Web Programming", textAlign: TextAlign.center),
            ]
        )
    );
  }
  
  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
      appBar: AppBar(title: Text("General Programming"), backgroundColor: Colors.deepPurple,),
      body: Container(
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text("Language Portfolio",style: TextStyle(fontSize: 30),),
              Text("Different programming examples.",style: TextStyle(fontSize: 14), textAlign: TextAlign.center,),

              ImageContainer(["csharp","python"], Colors.blueAccent),

              Padding(padding: EdgeInsets.only(top: 20)),

              Divider(thickness: 2, color: Colors.deepPurpleAccent,),

              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  homeBtn(context),
                  Padding(padding: EdgeInsets.symmetric(horizontal: 20)),
                  webBtn(context)
                ]
              )
            ],
          ),
        ),
      ),
    );
  }
}

class WebPage extends StatefulWidget
{
  const WebPage({Key? key}): super(key:key);

  _WebPage createState() => _WebPage();
}

class _WebPage extends State<WebPage>
{
  Widget homeBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.home, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/HomePage");},
              ),
              const Text("HomePage", textAlign: TextAlign.center),
            ]
        )
    );
  }

  Widget programBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.description_outlined, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/ProgrammingPage");},
              ),
              const Text("General Programming", textAlign: TextAlign.center),
            ]
        )
    );
  }

  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
      appBar: AppBar(title: Text("Web Programming"), backgroundColor: Colors.deepPurple,),

      body: Container(
        padding: EdgeInsets.symmetric(vertical: 40),
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text("Web Portfolio",style: TextStyle(fontSize: 30),),
              Text("Different web examples.",style: TextStyle(fontSize: 14), textAlign: TextAlign.center,),

              ImageContainer(["html5","css"], Colors.blueAccent),

              Padding(padding: EdgeInsets.only(top: 20)),

              Divider(thickness: 2, color: Colors.deepPurpleAccent,),

              Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    programBtn(context),
                    Padding(padding: EdgeInsets.symmetric(horizontal: 20)),
                    homeBtn(context),
                  ]
              )
            ],
          ),
        ),
      ),
    );
  }
}


class PythonExample extends StatefulWidget
{
  const PythonExample({Key? key}): super(key:key);

  _PythonExample createState() => _PythonExample();
}

class _PythonExample extends State<PythonExample>
{
  Widget programBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.description_outlined, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/ProgrammingPage");},
              ),
              const Text("Programming Page", textAlign: TextAlign.center),
            ]
        )
    );
  }

  Widget homeBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.home, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/HomePage");},
              ),
              const Text("HomePage", textAlign: TextAlign.center),
            ]
        )
    );
  }

  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
      appBar: AppBar(title: Text("Python Example"), backgroundColor: Colors.deepPurple,),

      body: ListView(
        children: [

          Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Padding(padding: EdgeInsets.all(10)),
              Text("Reads obj file and uses turtle to draw the model",style: TextStyle(fontSize: 14),),

              FileData("assets/obj_reader.py"),

              Divider(thickness: 2, color: Colors.deepPurpleAccent,),

              Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    programBtn(context),
                    Padding(padding: EdgeInsets.symmetric(horizontal: 40),),
                    homeBtn(context)
                  ]
              ),

              Padding(padding: EdgeInsets.all(10)),
            ],
          ),
        ),
      ],
      )
    );
  }
}

class CSharpExample extends StatefulWidget
{
  const CSharpExample({Key? key}): super(key:key);

  _CSharpExample createState() => _CSharpExample();
}

class _CSharpExample extends State<CSharpExample>
{
  Widget programBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.description_outlined, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/ProgrammingPage");},
              ),
              const Text("Programming Page", textAlign: TextAlign.center),
            ]
        )
    );
  }

  Widget homeBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.home, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/HomePage");},
              ),
              const Text("HomePage", textAlign: TextAlign.center),
            ]
        )
    );
  }

  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
        appBar: AppBar(title: Text("C# Example"), backgroundColor: Colors.deepPurple,),

        body: ListView(
          children: [

            Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Padding(padding: EdgeInsets.all(10)),
                  Text("Basic pendulum",style: TextStyle(fontSize: 14),),

                  FileData("assets/BasicPendulum.cs"),

                  Divider(thickness: 2, color: Colors.deepPurpleAccent,),

                  Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        programBtn(context),
                        Padding(padding: EdgeInsets.symmetric(horizontal: 40),),
                        homeBtn(context)
                      ]
                  ),

                  Padding(padding: EdgeInsets.all(10)),
                ],
              ),
            ),
          ],
        )
    );
  }
}

class HTMLExample extends StatefulWidget
{
  const HTMLExample({Key? key}): super(key:key);

  _HTMLExample createState() => _HTMLExample();
}

class _HTMLExample extends State<HTMLExample>
{
  Widget webBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.web, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/WebPage");},
              ),
              const Text("Web Programming", textAlign: TextAlign.center),
            ]
        )
    );
  }

  Widget homeBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.home, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/HomePage");},
              ),
              const Text("HomePage", textAlign: TextAlign.center),
            ]
        )
    );
  }

  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
        appBar: AppBar(title: Text("HTML5 Example"), backgroundColor: Colors.deepPurple,),

        body: ListView(
          children: [

            Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Padding(padding: EdgeInsets.all(10)),
                  Text("HTML sample",style: TextStyle(fontSize: 14),),

                  FileData("assets/index.html"),

                  Divider(thickness: 2, color: Colors.deepPurpleAccent,),

                  Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        webBtn(context),
                        Padding(padding: EdgeInsets.symmetric(horizontal: 40),),
                        homeBtn(context)
                      ]
                  ),

                  Padding(padding: EdgeInsets.all(10)),
                ],
              ),
            ),
          ],
        )
    );
  }
}

class CSSExample extends StatefulWidget
{
  const CSSExample({Key? key}): super(key:key);

  _CSSExample createState() => _CSSExample();
}

class _CSSExample extends State<CSSExample>
{
  Widget webBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.web, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/WebPage");},
              ),
              const Text("Web Programming", textAlign: TextAlign.center),
            ]
        )
    );
  }

  Widget homeBtn(BuildContext context)
  {
    return Container(
        child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                icon: Icon(Icons.home, color: Colors.redAccent,),
                iconSize: 70,
                onPressed: (){Navigator.of(context).pushNamed("/HomePage");},
              ),
              const Text("HomePage", textAlign: TextAlign.center),
            ]
        )
    );
  }

  @override
  Widget build(BuildContext context)
  {
    return Scaffold(
        appBar: AppBar(title: Text("CSS Example"), backgroundColor: Colors.deepPurple,),

        body: ListView(
          children: [

            Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Padding(padding: EdgeInsets.all(10)),
                  Text("CSS sample",style: TextStyle(fontSize: 14),),

                  FileData("assets/styles.css"),

                  Divider(thickness: 2, color: Colors.deepPurpleAccent,),

                  Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        webBtn(context),
                        Padding(padding: EdgeInsets.symmetric(horizontal: 40),),
                        homeBtn(context)
                      ]
                  ),

                  Padding(padding: EdgeInsets.all(10)),
                ],
              ),
            ),
          ],
        )
    );
  }
}

class ImageContainer extends StatefulWidget
{
  final images;
  final Color btnColor;

  ImageContainer(this.images, this.btnColor);

  _ImageContainer createState() => _ImageContainer();
}

class _ImageContainer extends State<ImageContainer>
{
  int index = 0;

  void nextImage()
  {
    setState(() {
      index = index < widget.images.length - 1 ? index + 1: 0;
    });
  }

  void prevImage()
  {
    setState(() {
      index = index > 0 ? index - 1: widget.images.length - 1;
    });
  }

  @override
  Widget build(BuildContext context)
  {
    return Container(
      width: 300,
      height: 300,

      decoration: const BoxDecoration(
        borderRadius: const BorderRadius.all(Radius.circular(10)),
      ),

      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          ClipRect(
            child:  Image.asset("assets/" + widget.images[index] + ".jpg",height: 250,fit: BoxFit.fitHeight),
          ),

          Padding(padding: EdgeInsets.symmetric(vertical: 10)),

          Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            ElevatedButton(
                style: ElevatedButton.styleFrom(primary: widget.btnColor,
                    textStyle: const TextStyle(color: Colors.white)),
                onPressed: prevImage,
                child: Text("<")
            ),

            Padding(padding: EdgeInsets.symmetric(horizontal: 10)),
            ElevatedButton(
                style: ElevatedButton.styleFrom(primary: widget.btnColor,
                    textStyle: const TextStyle(color: Colors.white)),
                onPressed: (){Navigator.of(context).pushNamed("/" + widget.images[index]);},
                child: Text("example " + index.toString(),textAlign: TextAlign.center,)
            ),
            Padding(padding: EdgeInsets.symmetric(horizontal: 10)),

            ElevatedButton(
                style: ElevatedButton.styleFrom(primary: widget.btnColor,
                    textStyle: const TextStyle(color: Colors.white)),
                onPressed: nextImage,
                child: Text(">")
            ),
          ],
        ),
      ],
      )
    );
  }
}

class FileData extends StatefulWidget
{
  final path;

  const FileData(this.path);

  _FileData createState() => _FileData();
}

class _FileData extends State<FileData>
{
  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
          border: Border.all(color: Colors.grey,width: 2,),
          borderRadius: BorderRadius.circular(10),
          color: Colors.white
      ),

      margin: EdgeInsets.symmetric(horizontal: 35),
      padding: EdgeInsets.all(10),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          FutureBuilder<String>(
            future: DefaultAssetBundle.of(context).loadString(widget.path),
            builder: (BuildContext context, AsyncSnapshot<String> snapshot) {
              if( snapshot.connectionState == ConnectionState.waiting){
                return  Center(child: Text('Please wait its loading...'));
              }else{
                return Center(child: new Text('${snapshot.data}'));
              }
            },
          )
        ]
      ),
    );
  }
}