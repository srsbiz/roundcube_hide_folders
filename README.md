Hide folders
============

Hide unwanted IMAP folder from subsrciption list. Server configuration or other mail clients may create special 
files/folders, that are visible as subscription options.

### Usage

* Download and put all files into `plugins/hide_folders` in your RoundCube installation
* Copy the `config.inc.php.dist` file to `config.inc.php` and modify, providing patterns for unwanted folders
* Edit your `config/main.inc.php` file and add `'hide_folders'` to your `$rcmail_config['plugins']`

### License

This plugin is released under the [GNU General Public License Version 3](http://www.gnu.org/licenses/gpl.html)
or later.
