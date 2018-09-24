# subapp/pack

## Data Packer and Serializator

### Compactor Result
```
php app/optimizer.php 
Packed: 36 bytes
JSON: 326 bytes
JSON (Short): 140 bytes

--------[ Optimization ]--------
JSON with JSON (Short): 232.86 % 
Packed Data with JSON (Short): 388.89 % 
Packed Data with JSON: 905.56 % 
-----

string(46) "??WZ?[??8?C?D??k~H?@??
?John Doe"
string(326) "{"userId":694184,"name":"John Doe","created":"2018-01-11T20:45:28+00:00","updated":"2018-05-19T20:45:28+00:00","boolean1":false,"boolean2":true,"boolean3":true,"boolean4":false,"boolean5":true,"boolean6":false,"boolean7":true,"boolean8":true,"boolean9":true,"float1":0.0001,"float2":1234.123,"double1":1234.123457,"double2":0}"
string(140) "{"created":1515703528,"updated":1526762728,"f1":0.0001,"f2":1234.123,"d1":1234.123457,"d2":0,"id":694184,"access":470,"userName":"John Doe"}"
```
