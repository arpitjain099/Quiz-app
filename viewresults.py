import csv
import sys
from pymongo import MongoClient
client = MongoClient()
db=client.mkh
import time
from time import gmtime, strftime
collection=db.responses
#print db
testid=sys.argv[1]
temp=collection.find({"testid":testid})
for doc in temp:
	print doc



completedtasks=[]

for i in temp:
	if username in i['taskid']:
		dica={"taskid":i['taskid'],"emailid":i['emailid'],"response":i["response"],"time":i["time"]}
		completedtasks.append(dica)
#print completedtasks

processedtasks=[]
collection2=db.processedtasks
processedtasks=[]
temp2=collection2.find()

for i in temp2:
	if username in i['taskid']:
		dica={"taskid":i['taskid'],"emailid":i['emailid']}
		processedtasks.append(dica)

total=[]
for i in completedtasks:
	if i not in processedtasks:
		total.append(i)
#print total
import codecs
import csv


collection_tasks=db.tasks
tasks=collection_tasks.find({"username": username})
#fi.write("question,imgurl, img1url,img2url,summary,textcontent,heading,mp3url,emailid of submitter,tasksymbol,time taken,price offered,response time, Approval ('Y'/'N')\n")	
			
with open("recruiterdir/"+sys.argv[1]+"/uploads/evaluation.csv", 'w') as csvfile:
    fieldnames = ['question', 'imgurl',"img1","img2","summary","textcontent","heading","mp3url","emailid of submitter","tasksymbol","time taken","price offered","response time", "Approval ('Y'/'N')"]
    writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
    writer.writeheader()
    for i in tasks:#task list
		for j in total:#tasks which have not been graded
			if j['taskid']==i['taskid']:
				#print type(i['taskid'])
				#if i['tasksymbol']==1 or i['tasksymbol']==3 or i['tasksymbol']==6 or i['tasksymbol']==9:
					#print "d"
				#writer.writerow({'first name': 'Baked', 'last_name': 'Beans'})
				writer.writerow({'question': i['question'], 'imgurl':i['imgurl'],'img1': i['img1'], 'img2':i['img2'],'summary': i['summary'], 'textcontent':i['textcontent'],'heading': i['heading'], 'mp3url':i['mp3url'],'emailid of submitter':j['emailid'],'tasksymbol':str(int(i['tasksymbol'])),'time taken':str(int(j['time'])),'price offered':str(int(i['price'])),'response time':str(int(j['response'])),"""Approval ('Y'/'N')""":""})


				#fi.write(i['question']+","+i['imgurl']+","+i['img1']+","+i['img2']+","+i['summary']+","+i['textcontent']+","+i['heading']+","+i['mp3url']+","+j['emailid']+","+str(int(i['tasksymbol']))+","+str(int(j['time']))+","+str(int(i['price']))+","+str(int(j['response']))+"," +"\n")


				#processed tasks - {  }
			
			
		

			#processed tasks - { }



			#if(i['tasksymbol']==1 or i['tasksymbol']==3 or i['tasksymbol']==6 or i['tasksymbol']==9):
			#	fi.write("dateofadding:"i['dateofadding']+","+"price":i['price']+","+"taskid":i['taskid']+","+"tasksymbol":i['tasksymbol']+","+"response":j['response']+","+"emailid":j['emailid'])
			#elif (i['tasksymbol']==1 or i['tasksymbol']==3 or i['tasksymbol']==6 or i['tasksymbol']==9):
			#	fi.write("dateofadding":i['dateofadding']+","+"price":i['price']+","+"taskid":i['taskid']+","+"tasksymbol":i['tasksymbol']+","+"response":j['response']+","+"emailid":j['emailid'])

#for i in total:




#for i in total:
#	fi.write()

	
#collection_rec.insert({"ada":"dada"})
#collection_rec.find_one({u'username':username})["count"]=11
#print collection_rec
#count= collection.find_one({"username":username})['count']

#print count
#print val
