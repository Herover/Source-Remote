#Source-Remote
This is a tool written in php to control source based games while you are on the go.

It use koraktors steam-condenser to communicate with servers, and a older version known to work with this tool is already installed for easy use - you might want to update yours to korakotrs newest.

I only made it just-work for me, but you might wan't to make changes to make it work for you.

I run the code here: http://remote.lolbrothers.com/hl2/

##Notice:
The code is bloated for many vulnerbilities. Most basic security features is enabled, but the safest use of the tool is to log in, get you stuff done and log out again.

The relevant cookies are deleted on logout, and no one wil be able to touch your server. If you are logged in, you could risk CSRF attacks.

It should not be possible to access the RCON password after you have logged in, and it disappers with the cookie on logout - no logs saved.

#Installation
Use 

    git clone https://github.com/Herover/Source-Remote.git 
    
to download files.

You will need to edit config.php to match your settings.

Edit you php.ini file to have this setting "output_buffering = On" or "output_buffering=4096".

#TODO
 * The current logging/banning module might be broken. This needs to be fixed.
 * Support for mod specific kick/ban commands and other commands
 * More testing



You are more than welcome to help with out :)
