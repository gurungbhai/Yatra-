
#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>

#define RST_PIN         5         //  Configurable, see typical pin layout above
#define SS_PIN          15         // Configurable, see typical pin layout above

MFRC522 mfrc522(SS_PIN, RST_PIN); 
int statuss = 0;
int out = 0;


const char *ssid = "Mark II 85";  //ENTER YOUR WIFI SETTINGS
const char *password = "jestha26@"; //enter your wifi password

 
const char *host = "192.168.0.1";   //https://circuits4you.com website or IP address of server


String id,postData;
int sensor = 11;
unsigned long start_time = 0;
unsigned long end_time = 0;
int steps=0;
//int steps_old=0;

void setup() 
{
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
   pinMode(D2,INPUT_PULLUP);
}

void loop()
 

{
  start_time=millis();
 end_time=start_time+1000;
 while(millis()<end_time)
 {
   if(digitalRead(D2))
   {
    steps=steps+1; 
    while(digitalRead(D2));
   }
   //setCursor(9,0);
   //Serial.println(steps);
   //Serial.println("   ");
 }
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  Serial.println();
  Serial.print(" UID tag :");
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  content.toUpperCase();
  Serial.println(id);
  
  
   
  HTTPClient http;    //Declare object of class HTTPClient

/*//Post Data
  postData = "status=" + ADCData + "&station=" + station ;*/



  //Post Data
  postData = "id=" +  content.substring(1) + "&finalstep=" + steps ;
  
  http.begin("http://192.168.0.105/yatra/card.php");              //Specify request destination with ipv4 
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload


  http.end();  //Close connection
  
}

//=======================================================================
