# server_domains
check server domains which is expired or parked
move domain.php to /root
crontab -e
00 03 * * * /usr/local/bin/php /root/domain.php
