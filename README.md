cas-snoop-poc
---

This is a demo of silently tracking website visitors through [CAS](http://www.jasig.org/cas) (Central Authentication Service).  Currently it is built for [BYU](http://www.byu.edu), using its installation of CAS, and including a lookup of public details associated with the username through a webservice.

I have a [demo installation](http://scintill.net/cas-snoop-poc/) you can try out if you like - I do not log BYU usernames or data that comes through this demo.

This is not exposing implementation flaws in either CAS or BYU services, but demonstrating what can be done if CAS allows authenticating to any URL, and if a user does not request to be prompted each time they are authenticated.  After seeing this demo, you will probably want to be prompted -- see [my userscript that helps with this](http://userscripts.org/scripts/show/123298).

An iframe is used to attempt an authentication through CAS.  This way, if it fails, it fails silently.  An attacker more intent on tracking BYU students might find some excuse to get them to authenticate through CAS and be sent back to the page for logging of the username and any other available details.
