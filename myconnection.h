#ifndef CONNECTION_H
#define CONNECTION_H

#include <mysql_connection.h>

#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/resultset.h>
#include <cppconn/statement.h>

using namespace std;

class MyConnection
{
    public:
		virtual ~MyConnection();
		MyConnection();
        static MyConnection* instance();
        void connect();
        void disconnect();
        sql::Connection* getConnection();
        sql::ResultSet* query(string);
        void execute(string);
    protected:


    private:
        static MyConnection* pInstance;
        sql::Connection* connection;
 };

#endif // CONNECTION_H
