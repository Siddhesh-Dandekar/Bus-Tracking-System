#include <Arduino.h>
#include <WiFi.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>

#define SLEEP_PIN D2


const char* ssid = "Realme";
const char* password = "112345679";


char db_host[] = "localhost";
char db_user[] = "id22061438_locateweb";
char db_pass[] = "Locate@111";
char db_name[] = "id22061438_locateme";


// Necessary Variables
String lati = "18.29697";
String longi = "73.147212";
boolean stringComplete = false;
String inputString = "";
String fromGSM = "";
char* response = " ";
String res = "";
int count = 0;
unsigned long sendDataPrevMillis = 0;
bool signupOK = false;
boolean gpsstatus = false;

unsigned long previousMillis = 0;  // will store the last time the code was executed
unsigned long interval = 60000;


WiFiClient client;
MySQL_Connection conn((Client*)&client);

char ip[] = "185.27.134.99"; // replace with your IP
IPAddress server;


void getGPSData(float* lat, float* lon) {
  digitalWrite(SLEEP_PIN, LOW);
  delay(1000);
  Serial1.println("AT+LOCATION=2");
  Serial.println("AT+LOCATION=2");

  String res = "";
  char* response;

  while (!Serial1.available())
    ;
  while (Serial1.available()) {
    char add = Serial1.read();
    String newadd = (String)add;
    res = res + newadd;
    delay(1);
  }

  res = res.substring(17, 38);
  response = &res[0];

  Serial.print("Received Data - ");
  Serial.println(response);  // printing the String in lower character form
  Serial.println("\n");

  bool gpsstatus = false;

  if (strstr(response, "GPS NOT")) {
    Serial.println("No Location data");
    //------------------------------------- Sending SMS without any location
    Serial1.println("Unable to fetch location. Please try again");
    delay(1000);
    Serial1.println((char)26);
    delay(1000);
  }

  else {
    int i = 0;
    while (response[i] != ',')
      i++;

    String location = (String)response;
    String lati = location.substring(2, i);
    String longi = location.substring(i + 1);

    *lat = lati.toFloat();
    *lon = longi.toFloat();

    gpsstatus = true;
    delay(1000);
  }
  response = "";
  res = "";
}

void setup() {
  Serial.begin(115200);
  Serial1.begin(115200, SERIAL_8N1, D0, D1);
  pinMode(SLEEP_PIN, OUTPUT);


  // Connecting to WiFi network
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");


  delay(10000);

  digitalWrite(SLEEP_PIN, LOW);  // Sleep Mode OFF

  Serial1.println("AT");  // Just Checking
  delay(1000);

  Serial1.println("AT+GPS = 1");  // Turning ON GPS
  delay(1000);

  Serial1.println("AT+SLEEP = 1");  // Configuring Sleep Mode to 1
  delay(1000);

  Serial1.println("AT+CBC?");
  delay(1000);

  Serial1.println("AT+LOCATION = 2");
  delay(1000);

  digitalWrite(SLEEP_PIN, HIGH);

  if (conn.connect(server, 3306, db_user, db_pass)) {
    delay(1000);
  }
}

// interval at which to execute code (60 seconds)

void loop() {
  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= interval) {
    // save the last time the code was executed
    previousMillis = currentMillis;

    readserial();
    float lat, lon;
    getGPSData(&lat, &lon);

    // Create an INSERT query to add the new data
    char UPDATE_SQL[] = "UPDATE bus_location SET latitude = '%f', longitude = '%f' WHERE bus_unique_id = 3";

    char query[128];
    sprintf(query, UPDATE_SQL, lat, lon);

    // Execute the query
    MySQL_Cursor* cur_mem = new MySQL_Cursor(&conn);
    cur_mem->execute(query);
    delete cur_mem;

    // After the first execution, set the interval to 15 seconds
    interval = 1000;
  }
}


void readserial() {
  delay(500);
  //listen from GSM Module
  if (Serial1.available()) {
    char inChar = Serial1.read();

    if (inChar == '\n') {
      //write the actual response
      Serial.println(fromGSM);
      //clear the buffer
      fromGSM = "";

    } else {
      fromGSM += inChar;
    }
    delay(20);
  }

  // read from port 0, send to port 1:
  if (Serial.available()) {
    int inByte = Serial.read();
    Serial1.write(inByte);
  }
  //only write a full message to the GSM module
  if (stringComplete) {
    Serial1.print(inputString);
    inputString = "";
    stringComplete = false;
  }
}
