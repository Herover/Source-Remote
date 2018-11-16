# Source-Remote

## Don't use this project
It's abandoned and lacks CSRF checks and is vulnerble to XSS attacks allowing other sites to trick your browser to perform commands if they know you are logged in and your game servers address. Besides implementing checks (which I do not plan on) the best protection is to not disclose the Source-Remote website you are usings address.

There's no known way for users to access other users RCON password after login, and it disappers with the cookie on logout - no logs saved.

# About
This is a tool written in php to control source based games while you are on the go.

It use koraktors steam-condenser to communicate with servers, and a older version known to work with this tool is already installed for easy use - you might want to update yours to korakotrs newest.

I only made it just-work for me, but you might want to make changes to make it work for you.

# Installation
Use 

    git clone https://github.com/Herover/Source-Remote.git 
    
to download files.

You will need to edit config.php to match your settings.

Edit you php.ini file to have this setting "output_buffering = On" or "output_buffering=4096".

# TODO
 * The current logging/banning module might be broken. This needs to be fixed.
 * Support for mod specific kick/ban commands and other commands
 * More testing



You are more than welcome to help with out :)
