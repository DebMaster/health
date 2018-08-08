package com.afrodeb.christine;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.provider.ContactsContract;

import java.util.Calendar;

/**
 * Created by Delon Savanhu on 2/24/2018.
 */

public class Helper {
    Context context;
    public static final String MyPREFERENCES = "MyPrefs" ;
    public static final String Name = "nameKey";
    public static final String EmailAddress = "emailAddressKey";
    public static final String Phone = "phoneKey";
    public static final String Age = "ageKey";
    public static final String Weight = "weightKey";
    public static final String Height = "heightKey";
    public static final String BMI = "bmiKey";
    public static final String RACE = "raceKey";
    public static final String WAIST = "waistKey";
    public static final String ACTIVE = "activeKey";
    public static final String OBESE = "obeseKey";
    public static final String RISK = "riskKey";
    public static final String BMR = "bmrKey";
    public static final String ONE = "oneKey";
    public static final String GENDER = "genderKey";
    SharedPreferences sharedpreferences;

    public Helper(Context _context){
        this.context=_context;
        sharedpreferences = context.getSharedPreferences(MyPREFERENCES, Context.MODE_PRIVATE);
    }
    public boolean initialise(){
    if (sharedpreferences.getString(Name,"").toString().equals("")){
        return false;
    }else{
        return true;
    }
    }
    public boolean setRisk(String risk){
        SharedPreferences.Editor editor = sharedpreferences.edit();
        editor.putString(RISK, risk);
        return editor.commit();
    }

    public boolean setPref(String one){
        SharedPreferences.Editor editor = sharedpreferences.edit();
        editor.putString(ONE, one);
        return editor.commit();
    }

    public boolean setProfile(String name,String phone,String email,String weight,String age,String height,String bmi,String obese,String waist,String race,String active,String bmr,String gender){
        try{
            obese="No";
            if(Double.parseDouble(bmi) > 30){
                obese="Yes";
            }
            SharedPreferences.Editor editor = sharedpreferences.edit();
        editor.putString(Name, name);
        editor.putString(Phone, phone);
        editor.putString(EmailAddress, email);
        editor.putString(Weight,weight);
        editor.putString(Height,height);
        editor.putString(Age,age);
        editor.putString(BMI,bmi);
            editor.putString(RACE,race);
            editor.putString(WAIST,waist);
            editor.putString(OBESE,obese);
            editor.putString(ACTIVE,active);
            editor.putString(BMR,bmr);
            editor.putString(GENDER,gender);
        editor.commit();
        return true;
        }catch(Exception exc){
            exc.printStackTrace();
            return false;
        }
    }
    public String getBaseUrl(){
        return "http://192.168.1.8/health/";
    }

    public void logout(){
        SharedPreferences.Editor editor = sharedpreferences.edit();
        editor.clear();
        editor.commit();
    }

    public double calculateBmi(double height,double weight){
        height=height/100;//convert to meters
        return Math.round(weight/(height*height));
    }

    public String getBmi(){
        return sharedpreferences.getString(BMI,"0");
    }
    public String getBmr(){
        return sharedpreferences.getString(BMR,"0");
    }
    public String getGender(){
        return sharedpreferences.getString(GENDER,"0");
    }
    public String getRisk(){
        return sharedpreferences.getString(RISK,"None");
    }
    public String getEmail(){
        return sharedpreferences.getString(EmailAddress,"0");
    }
    public String getOne(){
        return sharedpreferences.getString(ONE,"");
    }
    public String getGroup(){
        String bmi=this.getBmi();
        double dBmi=Double.parseDouble(bmi);
        if (dBmi <= 18.5){
            return "Underweight";
        }else if(dBmi > 18.5 && dBmi <= 26.5){
            return "Normal Weight";
        }else{
            return "Overweight";
        }
    }

    public void action(Context context,int id){
Intent i;
if (id == R.id.nav_activities){
//i=new Intent(context,WeeklyActivitities.class);
    i=new Intent(context,BasicActivity.class);
    context.startActivity(i);
}else if(id == R.id.nav_dashboard){
    i=new Intent(context,HomeActivity.class);
    context.startActivity(i);
}else if(id == R.id.nav_meal){
    i=new Intent(context,MealsActivity.class);
    context.startActivity(i);
}else if(id == R.id.nav_lifestyle){
    i=new Intent(context,LifestyleActivity.class);
    context.startActivity(i);
}else if(id == R.id.nav_logout){
    SharedPreferences.Editor editor = sharedpreferences.edit();
    editor.putString(Name, "");
    editor.putString(Phone, "");
    editor.putString(EmailAddress, "");
    editor.putString(Weight,"");
    editor.putString(Height,"");
    editor.putString(Age,"");
    editor.putString(BMI,"");
    editor.putString(RACE,"");
    editor.putString(WAIST,"");
    editor.putString(OBESE,"");
    editor.putString(ACTIVE,"");
    editor.putString(RISK,"");
    editor.putString(ONE,"");
    editor.commit();
    i=new Intent(context,LoginActivity.class);
    context.startActivity(i);
}
    }
public String getMealTime(){
    Calendar c = Calendar.getInstance();
    int timeOfDay = c.get(Calendar.HOUR_OF_DAY);
    if(timeOfDay >= 0 && timeOfDay < 12){
        return "Morning";
    }else if(timeOfDay >= 12 && timeOfDay < 16){
        return "Afternoon";
    }else if(timeOfDay >= 16 && timeOfDay < 21){
        return "Evening";
    }
    return "Morning";
}
    public String getDay(){
        Calendar c = Calendar.getInstance();
        int day = c.get(Calendar.DAY_OF_WEEK);
        return Integer.toString(day);
    }
}
