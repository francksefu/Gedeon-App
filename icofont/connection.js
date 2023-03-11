/*var mysql = require('mysql');

const con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "pharmacie"
});

con.connect()
*/
//
var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "pharmacie"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});