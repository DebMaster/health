package com.afrodeb.christine;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.util.Log;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class AddMealPreferenceActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    public Spinner one,two,three,four,five;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_meal_preference);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
       final Helper helper=new Helper(AddMealPreferenceActivity.this);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
       one=(Spinner)findViewById(R.id.one);
        two=(Spinner)findViewById(R.id.two);
        three=(Spinner)findViewById(R.id.three);
        four=(Spinner)findViewById(R.id.four);
        //five=(Spinner)findViewById(R.id.five);
        List oneChoice=new ArrayList<String>();
        oneChoice.add("No Restrictions");
        oneChoice.add("Pescatarian (eats white meat)");
        oneChoice.add("Vegan (no animal products)");
        oneChoice.add("Meatatarian (eats all type of edible meat)");
        ArrayAdapter<Integer> oneAdapter = new ArrayAdapter<Integer>(
                this, android.R.layout.simple_spinner_item, oneChoice);
        oneAdapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item );
        one.setAdapter(oneAdapter);
        //--------------------------------------------------------------------------------
        List twoChoice=new ArrayList<String>();
        twoChoice.add("Skip out breakfast?");
        twoChoice.add("Dairy foods (cheese, yoghurt milk)");
        twoChoice.add("Cereal (grains, oats, nuts etc.)");
        twoChoice.add("Refined grain products (cakes, biscuits, bread)");
        ArrayAdapter<Integer> twoAdapter = new ArrayAdapter<Integer>(
                this, android.R.layout.simple_spinner_item, twoChoice);
        twoAdapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item );
        two.setAdapter(twoAdapter);
        //--------------------------------------------------------------------------------
        List threeChoice=new ArrayList<String>();
        threeChoice.add("None");
        threeChoice.add("Gluten free");
        threeChoice.add("Dairy free");
        threeChoice.add("Pregnant/Nursing");
        ArrayAdapter<Integer> threeAdapter = new ArrayAdapter<Integer>(
                this, android.R.layout.simple_spinner_item, threeChoice);
        threeAdapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item );
        three.setAdapter(threeAdapter);
        //--------------------------------------------------------------------------------
        List fourChoice=new ArrayList<String>();
        fourChoice.add("Starch");
        fourChoice.add("Protein");
        fourChoice.add("Fat");
        fourChoice.add("Refined grain products (cakes, biscuits, bread)");
        ArrayAdapter<Integer> fourAdapter = new ArrayAdapter<Integer>(
                this, android.R.layout.simple_spinner_item, fourChoice);
        fourAdapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item );
        four.setAdapter(fourAdapter);
        //--------------------------------------------------------------------------------
        /*List fiveChoice=new ArrayList<String>();
        fiveChoice.add("Dairy foods (cheese, yoghurt milk)");
        fiveChoice.add("Cereal (grains, oats, nuts etc.)");
        fiveChoice.add("Refined grain products (cakes, biscuits, bread)");
        ArrayAdapter<Integer> fiveAdapter = new ArrayAdapter<Integer>(
                this, android.R.layout.simple_spinner_item, fileChoice);
        fiveAdapter.setDropDownViewResource( android.R.layout.simple_spinner_dropdown_item );
        five.setAdapter(fiveAdapter);*/
        Button mEmailSignInButton = (Button) findViewById(R.id.email_sign_in_button);
        mEmailSignInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    final String oneValue = one.getSelectedItem().toString();
                    final String twoValue = two.getSelectedItem().toString();
                    final String threeValue = three.getSelectedItem().toString();
                    final String fourValue = four.getSelectedItem().toString();
                    final String email = helper.getEmail();
                    final String bmr = helper.getBmr();
                    final String gender = helper.getGender();
                    if (oneValue.contains("Vegan ") && twoValue.contains("Dairy ")) {
                        Toast.makeText(AddMealPreferenceActivity.this, "Make sure you have vegan choices", Toast.LENGTH_LONG).show();
                    } else {
                        final ProgressDialog pDialog = new ProgressDialog(AddMealPreferenceActivity.this);
                        pDialog.setMessage("Adding Your Information...");
                        pDialog.show();
                        try {
                            String url = helper.getBaseUrl() + "preferences.php";
                            StringRequest postRequest2 = new StringRequest(Request.Method.POST, url,
                                    new Response.Listener<String>() {
                                        @Override
                                        public void onResponse(String response) {
                                            try {
                                                if(helper.setPref(oneValue)){
                                                    Intent i = new Intent(AddMealPreferenceActivity.this, MealsActivity.class);
                                                    startActivity(i);
                                                }else{
                                                    Toast.makeText(AddMealPreferenceActivity.this,"We could not process that request",Toast.LENGTH_LONG).show();
                                                }
                                                System.out.println(response);
                                                pDialog.dismiss();
                                            } catch (Exception ex) {
                                                ex.printStackTrace();
                                            }
                                        }
                                    },
                                    new Response.ErrorListener() {
                                        @Override
                                        public void onErrorResponse(VolleyError error) {
                                            pDialog.dismiss();
                                            Log.d("Error.Response", error.getMessage());
                                            System.out.print(error.getMessage());
                                            //Toast.makeText(DeliveriesActivity.this,error.getMessage(),Toast.LENGTH_LONG).show();
                                        }
                                    }
                            ) {
                                @Override
                                protected Map<String, String> getParams() {
                                    Map<String, String> params = new HashMap<String, String>();
                                    params.put("one", oneValue);
                                    params.put("two", twoValue);
                                    params.put("three", threeValue);
                                    params.put("four", fourValue);
                                    params.put("email", email);
                                    params.put("bmr", bmr);
                                    params.put("gender", gender);
                                    return params;
                                }
                            };
                            postRequest2.setRetryPolicy(new DefaultRetryPolicy(80000, 0, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
                            Volley.newRequestQueue(AddMealPreferenceActivity.this).add(postRequest2);

                        } catch (Exception ex) {
                            ex.printStackTrace();
                        }

                    }
                        //Toast.makeText(RegisterActivity.this,Double.toString(bmi),Toast.LENGTH_LONG).show();
                    }catch(Exception ex){
                        ex.printStackTrace();
                    }


            }
        });

    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.add_meal_preference, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        Helper helper=new Helper(AddMealPreferenceActivity.this);
        helper.action(AddMealPreferenceActivity.this,id);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
