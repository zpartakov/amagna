clear
echo "This script will automatically update production website with dev website"
echo "-------------------------------------------------------------------------"
cd /var/www/atable20/app
killbakall
cp ~/.netrc.www.picadametles.ch  ~/.netrc
mysqldump --add-drop-table picadametlesch5 > picadametlesch5.sql
#mirroring pmcake files
lftp -e "open www.picadametles.ch; mirror -R /var/www/atable20/app /web/atable20/app; exit"
lftp -e "open www.picadametles.ch; mv /web/atable20/app/config/database.php.server /web/atable20/app/config/database.php; exit"
lftp -e "open www.picadametles.ch; mv /web/atable20/app/config/core.php.server /web/atable20/app/config/core.php; exit"
lftp -e "open www.picadametles.ch; chmod -R 777 /web/atable20/app/tmp; exit"
lftp -e "open www.picadametles.ch; rm -fr /web/atable20/app/tmp/cache/persistent/* ; exit"
lftp -e "open www.picadametles.ch; rm -fr /web/atable20/app/tmp/cache/models/* ; exit"
lftp -e "open www.picadametles.ch; rm -fr /web/atable20/app/tmp/cache/views/* ; exit"
lftp -e "open www.picadametles.ch; rm -fr /web/atable20/app/tmp/cache/views/* ; exit"
#backup db on infomaniak
lftp -e "open www.picadametles.ch; cd ../data; put /var/www/atable20/app/picadametlesch5.sql; exit"
echo "-------------------------------------------------------------------------"
echo "OK, dev website has been pulled to prod website"
