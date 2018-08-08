package com.afrodeb.christine;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;

import com.github.anastr.speedviewlib.SpeedView;

public class HomeActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
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

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        Helper h = new Helper(HomeActivity.this);
        if(!h.initialise()){
            Intent i=new Intent(this,LoginActivity.class);
            startActivity(i);
        }else {
            String srisk="None";
            if(getIntent().getStringExtra("risk") != null){
                srisk=getIntent().getStringExtra("risk");
            }else{
                srisk=h.getRisk();
            }
            SpeedView speedometer = (SpeedView) findViewById(R.id.speedView);
            double speed = Double.parseDouble(h.getBmi());
            System.out.print(speed);
            speedometer.speedTo((int) speed);
            speedometer.setLowSpeedPercent(26);
            speedometer.setMediumSpeedPercent(29);
            speedometer.setUnit("B.M.I");
            TextView textView = (TextView) findViewById(R.id.section_label);
            textView.setText(h.getGroup());
            TextView risk = (TextView) findViewById(R.id.risk);
            risk.setText("Associated risks: \n"+srisk);
            String bmrGroup="";
            TextView bmr = (TextView) findViewById(R.id.bmr);
            double bmrV=Double.parseDouble(h.getBmr());
            if(bmrV < 1490 && h.getGender().equals("Female")){
                bmrGroup="Low BMR";
            }else if(bmrV > 1490 && h.getGender().equals("Female")){
                bmrGroup="High BMR";
            }else if(bmrV < 1660 && h.getGender().equals("Male")){
                bmrGroup="Low BMR";
            }else if(bmrV > 1660 && h.getGender().equals("Male")){
                bmrGroup="High BMR";
            }
            bmr.setText("BMR: "+h.getBmr()+" - "+bmrGroup+".");
        }
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
        getMenuInflater().inflate(R.menu.home, menu);
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
        Helper h=new Helper(HomeActivity.this);
        h.action(HomeActivity.this,id);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
