About
=====
Student Records is a simple class records app. I created it out of
dissatisfaction with my school's paper-based records system, where the papers
were a poor reflection of reality. It grew to provide an interface for all the
classroom-management stuff I needed.

I wrote it in PHP and CodeIgniter because I needed to get it written quickly and
writing a webapp seemed to be the fastest way considering my prior experience.
And I really like the CodeIgniter framework, because the learning curve is much
lower than any other competing framework I've evaluated.

Caveats
=======
Because I wrote Student Records for my own use on my own (single) laptop, there
are a few features common to most webapps that this one doesn't have. First,
there is no support for multiple users. Second, there is no access control. I've
deemed that my laptop's security (lock screen password, login password, disk
encryption, etc.) is adequate for my situation.

Because I wrote it exclusively for my own use, it isn't documented well and is
doubtless full of usability issues. Also, I didn't bother with validation beyond
what is available directly in HTML 5.

The feature set is narrowly limited to a very specific situation. I'm
distributing this app as a part of my protfolio. I don't expect it to be useful
to anyone else in its current state in terms of actual use.

I've only tested Student Records in Chromium running under Linux. I think it
will work on any modern browser and OS, but I can't say for sure.

Installation
============

Dependencies
------------
On your local machine, you need to already have Apache 2 with mod_rewrite, PHP
5, and MySQL 5 properly installed and configured. I recommend that you configure
Apache to use virtual hosts and use /etc/hosts (or your own local DNS server) to
create virtual hostnames, so that you can access your websites at URLs like
"http://sr.mss/" or whatever you choose to call them.

For security reasons, I recommend that Apache be configured to only accept
connections from localhost.

Installation Steps
------------------
1. Unpack the tar file into an appropriate document root. The source root
   directory should be the document root, such that it can be accessed from a
   browser with the bare hostname (e.g., "http://sr.mss/"). Some parts of the
   app assume that they can access a URL such as "/js/something.js" and have it
   work.

2. Create a database for Student Records to use. It assumes that it owns the
   entire database. If you want to make it share a database, it's up to you to
   make sure that no conflicts arise.

3. Using the MySQL management tool of your choice, import sr_backup.sql into
   MySQL. This file will create the schema and load sample data.

4. Edit the following configuration files:
   
   A. application/config/config.php: Set `$config['base_url']` to the URL you
      intend to use to access the app. I use "http://sr.mss/" here.
   
   B. application/config/database.php: Configure your database connection
      details on the various `$db['default']` lines. Note that although
      CodeIgniter supports multiple databases, the queries in this app were not
      written with portability in mind and might not work on any database other
      than MySQL, which is why MySQL is listed as a hard dependency.

5. Verify that Apache is able to use mod_rewrite and .htaccess files.

6. You're done! Open up a browser and point it at the hostname that you
   configured.
