tot="`cat temp/persend.txt`"
a=`wc -l 'list/list.txt' | awk '{ print $1 }'`
n=`expr "$a" / "$tot"`
u=`expr "$n" + "1"`
for i in $(seq 1 $u);
do
     if [ ! -s list/list.txt ];
    then
            exit
    fi
     php "send2.php"
done