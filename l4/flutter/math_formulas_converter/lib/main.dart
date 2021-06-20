import 'package:flutter/material.dart';
// ignore: import_of_legacy_library_into_null_safe
import 'package:katex_flutter/katex_flutter.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Converter',
      theme: ThemeData(
        // This is the theme of your application.
        //
        // Try running your application with "flutter run". You'll see the
        // application has a blue toolbar. Then, without quitting the app, try
        // changing the primarySwatch below to Colors.green and then invoke
        // "hot reload" (press "r" in the console where you ran "flutter run",
        // or simply save your changes to "hot reload" in a Flutter IDE).
        // Notice that the counter didn't reset back to zero; the application
        // is not restarted.
        primaryColor: Colors.indigo[100],
      ),
      home: MyHomePage(title: 'Page to convert latex formula'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key? key, required this.title}) : super(key: key);

  // This widget is the home page of your application. It is stateful, meaning
  // that it has a State object (defined below) that contains fields that affect
  // how it looks.

  // This class is the configuration for the state. It holds the values (in this
  // case the title) provided by the parent (in this case the App widget) and
  // used by the build method of the State. Fields in a Widget subclass are
  // always marked "final".

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  var _converted = '';
  TextEditingController formulasController = new TextEditingController();

  void _convert() {
    setState(() {
      _converted = formulasController.text;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text(widget.title)),
      body: LayoutBuilder(
        builder: (BuildContext context, BoxConstraints constraints) {
          if (constraints.maxWidth > 600) {
            return row_version();
          } else {
            return column_version();
          }
        },
      ),
    );
  }

  Widget column_version(){
    return Column(
          children: <Widget>[
            Flexible(
              flex: 5,
              child : Padding(
                padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
                child: TextField(
                  minLines: 3,
                  maxLines: 10,
                  controller: formulasController,
                  decoration: InputDecoration(border: OutlineInputBorder(borderSide: new BorderSide(color: Colors.indigo)), hintText: 'Enter latex formula'),
                ),
              )
            ),
            Flexible(
              flex: 1,
              child: Padding(
                padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
                child : TextButton(
                  style: TextButton.styleFrom(
                    textStyle: const TextStyle(fontSize: 20),
                    primary: Colors.indigo[300],
                  ),
                  onPressed: _convert,
                  child: const Text('Convert'),
                ),
              ),
            ),
            Flexible(
              flex: 5,
              child: Container(
                width: double.infinity,
                margin: const EdgeInsets.all(15.0),
                padding: const EdgeInsets.all(3.0),
                decoration: BoxDecoration(border: Border.all(color: Colors.indigo)),
                child : Padding(
                  padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
                  child : KaTeX(
                    laTeXCode: Text(_converted),
                    delimiter: r'$',
                    displayDelimiter: r'$$',
                  ),
                )
              )
            )
          ],
      );
  }

  Widget row_version(){
    return Row(
          children: <Widget>[
            Flexible(
              flex: 5,
              child : Padding(
                padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
                child: TextField(
                  minLines: 3,
                  maxLines: 10,
                  controller: formulasController,
                  decoration: InputDecoration(border: OutlineInputBorder(borderSide: new BorderSide(color: Colors.indigo)), hintText: 'Enter latex formula'),
                ),
              )
            ),
            Flexible(
              flex: 1,
              child: Padding(
                padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
                child : TextButton(
                  style: TextButton.styleFrom(
                    textStyle: const TextStyle(fontSize: 20),
                    primary: Colors.indigo[300],
                  ),
                  onPressed: _convert,
                  child: const Text('Convert'),
                ),
              ),
            ),
            Flexible(
              flex: 5,
              child: Container(
                width: double.infinity,
                margin: const EdgeInsets.all(15.0),
                padding: const EdgeInsets.all(3.0),
                decoration: BoxDecoration(border: Border.all(color: Colors.indigo)),
                child : Padding(
                  padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
                  child : KaTeX(
                    laTeXCode: Text(_converted),
                    delimiter: r'$',
                    displayDelimiter: r'$$',
                  ),
                )
              )
            )
          ],
      );
  }
}
