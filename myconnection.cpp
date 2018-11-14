#include "myconnection.h"
#include <cstddef>

using namespace std;

MyConnection* MyConnection::pInstance = NULL;

MyConnection* MyConnection::instance()
{
    if (pInstance == NULL)
    {
        pInstance = new MyConnection;
    }
    return pInstance;
}

MyConnection::MyConnection()
{
    this->connection = NULL;
}

MyConnection::~MyConnection()
{
    this->disconnect();
}

void MyConnection::disconnect()
{
    delete this->connection;
}

void MyConnection::connect()
{
    string server = "tcp://localhost:3306";
    string user = "root";
    string password = "root";
    string database = "proyecto";

    /* Connect to database */
    sql::Driver* driver = get_driver_instance();
    this->connection = driver->connect(server, user, password);
    connection->setSchema(database);
}

sql::Connection* MyConnection::getConnection()
{
    return this->connection;
}

sql::ResultSet* MyConnection::query(string stringSQL)
{
    if (!this->connection)
        this->connect();

    return this->connection->createStatement()->executeQuery(stringSQL);
}

void MyConnection::execute(string stringSQL)
{
    if (!this->connection)
        this->connect();

    this->connection->createStatement()->executeUpdate(stringSQL);
}
