#include <Timer.h>
#include <Wire.h>
#include <MAX30105.h>
#include <heartRate.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include "CTBot.h"
CTBot myBot ;


char ssid[] = "CBNET_AMAR";
char pass[]= "aulia123";
String token = "5787810058:AAGJ8JTjJqEy0r8hhpAymY0GrvdBtLqjVgc";
const int id = -645836596 ;

MAX30105 sensorOximeter ;

const byte RATE_SIZE = 4;
byte rates[RATE_SIZE] ;
byte rateSpot = 0 ;
long lastBeat = 0 ;

float beatPerMinute ;
int beatAvg ;

Timer t ;

String datakirim ;

const char* server = "192.168.43.213";

void setup() {
  Serial.begin(115200);
  myBot.setTelegramToken(token);
    
  if (!sensorOximeter.begin(Wire,I2C_SPEED_FAST))
  {
  Serial.println("MAX30102 Tidak Ditemukan, Cek Pengkabelan");
  while (1);
  }  
  Serial.println("Silahkan Letakkan Jari Anda Di Atas Sensor Sambil Di Tekan Sedikit");
  
  sensorOximeter.setup();
  sensorOximeter.setPulseAmplitudeRed(0x0A);
  sensorOximeter.setPulseAmplitudeGreen(0);  



  WiFi.begin(ssid, pass);    
  while(WiFi.status()!= WL_CONNECTED)  
  {
   Serial.print (".");
   delay (500);
  }  
   
  Serial.println("Terkoneksi ke WiFi"); 
  t.every(2000, kirimdata);
  
}
  void kirimdata()    
  {
    WiFiClient client ;
    int port = 80 ;
    if(!client.connect(server, port))
    {
      Serial.println("Koneksi ke server gagal");
      return ; 
    } 
    String Link ;
    HTTPClient http ;
    Link = "http://" + String(server) + "/webjantung/kirimdata.php?data=" + datakirim;
    http.begin(client, Link);
    http.GET() ;
    String respon = http.getString();
    Serial.println(respon);
    http.end();
     
    
  }

void loop () {
    
  t.update ();

  long irValue = sensorOximeter.getIR();
  if (checkForBeat(irValue) == true)
  {

    long delta = millis() - lastBeat;
    lastBeat = millis() ;

    beatPerMinute = 60 / (delta/1000.0);

    if(beatPerMinute< 255 && beatPerMinute > 20)
    {
      rates[rateSpot++] = (byte)beatPerMinute ;
      rateSpot %= RATE_SIZE; 
      beatAvg = 0;
      for (byte x = 0; x < RATE_SIZE; x++)
      {
       beatAvg += rates[x];
      }
      beatAvg /= RATE_SIZE;

    }

  } 

  Serial.print ("IR = " + String(irValue));
  Serial.print (", BPM = " + String(beatPerMinute));
  Serial.print (", AVG BPM =" + String(beatAvg));
   
   if(irValue < 50000)
  {
   Serial.print(",No Finger");
   datakirim = "NoFinger";
   beatPerMinute = 0;
   beatAvg = 0;
     
  }
   else
  { 
    datakirim = String (beatAvg);
  }
if(beatAvg > 0)  
{
  myBot.sendMessage(id,datakirim); 
  
}

 Serial.println();
} 