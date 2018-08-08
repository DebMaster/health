package com.afrodeb.christine;

import android.app.ProgressDialog;
import android.net.Uri;
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
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;

public class LifestyleActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    public static ListView list;
    public static  ListView listView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lifestyle);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        //Helper helper=new Helper(LifestyleActivity.this);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
        Helper h=new Helper(LifestyleActivity.this);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        String bmi=h.getBmi();
        //rootView = inflater.inflate(R.layout.fragment_advice, container, false);
        String url = h.getBaseUrl()+"getadvice.php?bmi=" + Uri.encode(bmi);
        //System.out.println(url);
        final ProgressDialog pDialog = new ProgressDialog(LifestyleActivity.this);
        pDialog.setMessage("Getting advice...");
        pDialog.show();
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            listView=(ListView)findViewById(R.id.advice);
                            //Toast.makeText(getContext(), response, Toast.LENGTH_LONG).show();
                            JSONObject jsonResponse = new JSONObject(response);
                            JSONArray results=jsonResponse.getJSONArray("results");
                            //System.out.println(results.length());
                            final ArrayList<String> list = new ArrayList<String>();
                            for(int x=0; x < results.length(); x++){
                                JSONObject item=results.getJSONObject(x);
                                list.add(item.getString("message"));
                                //System.out.println(item.getString("message"));
                            }

                            final ArrayAdapter adapter = new ArrayAdapter(LifestyleActivity.this,android.R.layout.simple_list_item_1, list);
                            listView.setAdapter(adapter);
                            pDialog.dismiss();
                        } catch (Exception ex) {
                            pDialog.dismiss();
                            Toast.makeText(LifestyleActivity.this, "We are facing issues retrieving data.", Toast.LENGTH_LONG).show();
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
                        Toast.makeText(LifestyleActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();
                    }
                }
        ) {

        };
        postRequest.setRetryPolicy(new DefaultRetryPolicy(80000, 0, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        //queue.add(postRequest);
        Volley.newRequestQueue(LifestyleActivity.this).add(postRequest);

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
        getMenuInflater().inflate(R.menu.lifestyle, menu);
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

        Helper h=new Helper(LifestyleActivity.this);
        h.action(LifestyleActivity.this,id);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
