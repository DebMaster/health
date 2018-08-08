package com.afrodeb.christine;

import android.app.ProgressDialog;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.widget.Toast;
import com.alamkanak.weekview.WeekViewEvent;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import org.json.JSONArray;
import org.json.JSONObject;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;
import java.util.Random;

public class BasicActivity extends BaseActivity {
public List<WeekViewEvent> events;
public Calendar startTime;
    @Override
    public List<? extends WeekViewEvent> onMonthChange(final int newYear, final int newMonth) {
        events = new ArrayList<WeekViewEvent>();
        Helper helper=new Helper(BasicActivity.this);
        String bmi=helper.getBmi();
        String bmr=helper.getBmr();
        String gender=helper.getGender();
        String url = helper.getBaseUrl()+"getactivities.php?bmi=" + Uri.encode(bmi)+"&bmr="+ Uri.encode(bmr)+"&gender="+ Uri.encode(gender);
        System.out.println(url);
        final int [] colors={R.color.event_color_01,R.color.event_color_02,R.color.event_color_03,R.color.event_color_04};
        startTime = Calendar.getInstance();
        startTime.set(Calendar.HOUR_OF_DAY, 3);
        startTime.set(Calendar.MINUTE, 0);
        startTime.set(Calendar.MONTH, newMonth - 1);
        startTime.set(Calendar.YEAR, newYear);
        Calendar endTime = (Calendar) startTime.clone();
        endTime.add(Calendar.HOUR, 1);
        endTime.set(Calendar.MONTH, newMonth - 1);
        WeekViewEvent event = new WeekViewEvent(1, getEventTitle(startTime), startTime, endTime);
        event.setColor(getResources().getColor(R.color.event_color_01));
        events.add(event);
        final ProgressDialog pDialog = new ProgressDialog(BasicActivity.this);
        pDialog.setMessage("Getting activities...");
        pDialog.show();
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            JSONArray results=jsonResponse.getJSONArray("results");
                            final ArrayList<String> list = new ArrayList<String>();
                            final int newYear2=newYear;
                            final int newMonth2=newMonth;
                            for(int x=0; x < results.length(); x++){
                                JSONObject item=results.getJSONObject(x);
                                String advice=item.getString("advice");
                                String time=item.getString("time");
                                String day=item.getString("day");
                                startTime = Calendar.getInstance();
                                int d=Integer.parseInt(new SimpleDateFormat("dd").format(startTime.getTime()));
                                int m=Integer.parseInt(new SimpleDateFormat("MM").format(startTime.getTime()));
                                int y=Integer.parseInt(new SimpleDateFormat("yyyy").format(startTime.getTime()));
                                startTime.set(Calendar.HOUR_OF_DAY, Integer.parseInt(time));
                                startTime.set(Calendar.MINUTE, 0);
                                startTime.set(Calendar.YEAR, y);
                                Calendar endTime = (Calendar) startTime.clone();
                                endTime.add(Calendar.HOUR, Integer.parseInt(time));
                                WeekViewEvent event = new WeekViewEvent(x, advice, startTime, endTime);
                                event.setColor(getResources().getColor(getRandom(colors)));
                                events.add(event);
                            }
                            pDialog.dismiss();
                        } catch (Exception ex) {
                            pDialog.dismiss();
                            Toast.makeText(BasicActivity.this, "We are facing issues retrieving data.", Toast.LENGTH_LONG).show();
                            ex.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        // error
                        pDialog.dismiss();
                        Log.d("Error.Response", error.getMessage());
                        Toast.makeText(BasicActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();
                    }
                }
        ) {

        };
        postRequest.setRetryPolicy(new DefaultRetryPolicy(80000, 0, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        //queue.add(postRequest);
        Volley.newRequestQueue(BasicActivity.this).add(postRequest);
        return events;
    }
    public static int getRandom(int[] array) {
        int rnd = new Random().nextInt(array.length);
        return array[rnd];
    }
}
