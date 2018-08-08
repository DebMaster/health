package com.afrodeb.christine;

import android.app.ProgressDialog;
import android.content.Intent;
import android.net.Uri;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;

import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.github.anastr.speedviewlib.SpeedView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Locale;

public class MainActivity extends AppCompatActivity {

    /**
     * The {@link android.support.v4.view.PagerAdapter} that will provide
     * fragments for each of the sections. We use a
     * {@link FragmentPagerAdapter} derivative, which will keep every
     * loaded fragment in memory. If this becomes too memory intensive, it
     * may be best to switch to a
     * {@link android.support.v4.app.FragmentStatePagerAdapter}.
     */
    private SectionsPagerAdapter mSectionsPagerAdapter;

    /**
     * The {@link ViewPager} that will host the section contents.
     */
    private ViewPager mViewPager;
public Helper helper;
public static ListView list;
public static  ListView listView;
public static   View rootView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        try {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_main);

            Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
            setSupportActionBar(toolbar);
            // Create the adapter that will return a fragment for each of the three
            // primary sections of the activity.
            mSectionsPagerAdapter = new SectionsPagerAdapter(getSupportFragmentManager());

            // Set up the ViewPager with the sections adapter.
            mViewPager = (ViewPager) findViewById(R.id.container);
            mViewPager.setAdapter(mSectionsPagerAdapter);
            helper = new Helper(this);
            FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
            fab.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();
                }
            });
            if (!helper.initialise()) {
                Intent i = new Intent(this, RegisterActivity.class);
                startActivity(i);
            }
            Intent i = new Intent(this, ActivitiesActivity.class);
            startActivity(i);
        }catch (Exception ex){
            ex.printStackTrace();
        }
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
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

    /**
     * A placeholder fragment containing a simple view.
     */
    public static class PlaceholderFragment extends Fragment {
        /**
         * The fragment argument representing the section number for this
         * fragment.
         */
        private static final String ARG_SECTION_NUMBER = "section_number";

        public PlaceholderFragment() {
        }

        /**
         * Returns a new instance of this fragment for the given section
         * number.
         */
        public static PlaceholderFragment newInstance(int sectionNumber) {
            PlaceholderFragment fragment = new PlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(ARG_SECTION_NUMBER, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {
            try {
                int index = 0;
                Helper h = new Helper(getContext());
                if (getArguments() != null) {
                    index = getArguments().getInt(ARG_SECTION_NUMBER);
                }
                rootView = inflater.inflate(R.layout.fragment_main, container, false);
                if (index == 1) {
                    SpeedView speedometer = rootView.findViewById(R.id.speedView);
                    double speed = Double.parseDouble(h.getBmi());
                    System.out.print(speed);
                    speedometer.speedTo((int) speed);
                    speedometer.setLowSpeedPercent(26);
                    speedometer.setMediumSpeedPercent(29);
                    speedometer.setUnit("B.M.I");
                    TextView textView = (TextView) rootView.findViewById(R.id.section_label);
                    textView.setText(h.getGroup());
                } else if (index == 2) {
                    String bmi=h.getBmi();
                    rootView = inflater.inflate(R.layout.fragment_advice, container, false);
                    String url = "http://172.28.10.11:8080/health/getadvice.php?bmi=" + Uri.encode(bmi);
                    //System.out.println(url);
                    final ProgressDialog pDialog = new ProgressDialog(getContext());
                    pDialog.setMessage("Getting advice...");
                    pDialog.show();
                    StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                            new Response.Listener<String>() {
                                @Override
                                public void onResponse(String response) {
                                    try {
                                        listView=(ListView) rootView.findViewById(R.id.advice);
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

                                        final ArrayAdapter adapter = new ArrayAdapter(getContext(),android.R.layout.simple_list_item_1, list);
                                        listView.setAdapter(adapter);
                                        pDialog.dismiss();
                                    } catch (Exception ex) {
                                        pDialog.dismiss();
                                        Toast.makeText(getContext(), "We are facing issues retrieving data.", Toast.LENGTH_LONG).show();
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
                                    Toast.makeText(getContext(), error.getMessage(), Toast.LENGTH_LONG).show();
                                }
                            }
                    ) {

                    };
                    postRequest.setRetryPolicy(new DefaultRetryPolicy(80000, 0, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
                    //queue.add(postRequest);
                    Volley.newRequestQueue(getContext()).add(postRequest);
                } else if (index == 3) {
                    rootView = inflater.inflate(R.layout.fragment_weekly, container, false);

                }
                return rootView;
            }catch(Exception ex){
                ex.printStackTrace();
                return null;
            }
        }
    }

    private static ArrayList sortAndAddSections(ArrayList itemList)
    {

        ArrayList tempList = new ArrayList();
        //First we sort the array
        Collections.sort(itemList);

        //Loops thorugh the list and add a section before each sectioncell start
        String header = "";
        /*for(int i = 0; i < itemList.size(); i++)
        {
            //If it is the start of a new section we create a new listcell and add it to our array
            if(header != itemList.get(i).getCategory()){
                ListCell sectionCell = new ListCell(itemList.get(i).getCategory(), null);
                sectionCell.setToSectionHeader();
                tempList.add(sectionCell);
                header = itemList.get(i).getCategory();
            }
            tempList.add(itemList.get(i));
        }*/

        return tempList;
    }

    /**
     * A {@link FragmentPagerAdapter} that returns a fragment corresponding to
     * one of the sections/tabs/pages.
     */
    public class SectionsPagerAdapter extends FragmentPagerAdapter {

        public SectionsPagerAdapter(FragmentManager fm) {
            super(fm);
        }

        @Override
        public Fragment getItem(int position) {
            // getItem is called to instantiate the fragment for the given page.
            // Return a PlaceholderFragment (defined as a static inner class below).
            return PlaceholderFragment.newInstance(position + 1);
        }

        @Override
        public int getCount() {
            // Show 3 total pages.
            return 3;
        }
    }
}
