package com.afrodeb.christine;

import android.support.annotation.NonNull;

/**
 * Created by user on 3/25/2018.
 */

public class ListCell implements Comparable{

    private String name;
    private String category;
    private boolean isSectionHeader;

    public ListCell(String name, String category)
    {
        this.name = name;
        this.category = category;
        isSectionHeader = false;
    }

    public String getName()
    {
        return name;
    }

    public String getCategory()
    {
        return category;
    }

    public void setToSectionHeader()
    {
        isSectionHeader = true;
    }

    public boolean isSectionHeader()
    {
        return isSectionHeader;
    }

/*    @Override
    public int compareTo(ListCell other) {
        return this.category.compareTo(other.category);
    }*/

    @Override
    public int compareTo(@NonNull Object o) {
        return 0;
    }
}
